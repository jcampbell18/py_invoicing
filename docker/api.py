# import necessary packages
import flask
from flask import request, jsonify, abort
from flask_restful import Resource, Api
from flask_cors import CORS
import json
import datetime
import mariadb

# create the flask app
app = flask.Flask(__name__)
app.config["DEBUG"] = True
CORS(app)

config = {
    'host': '127.0.0.1',
    'port': 3306,
    'user': 'root',
    'password': 'Password123!',
    'database': 'invoicing'
}

errorMessage = "Error: No id provided"

@app.route('/api/access_levels', methods=['GET'])
def access_levels():
   sql = "SELECT access_level_id, name, description FROM access_levels ORDER BY access_level_id"
   return get_results(sql)

@app.route('/api/access_levels/id', methods=['GET'])
def access_level_by_id():
   if 'id' in request.args:
      sql = "SELECT access_level_id, name, description FROM access_levels WHERE access_level_id=" + request.args['id']
      return get_results(sql)
   else:
      return errorMessage 

# @app.route('/api/access_levels/<int:id>', methods=['GET'])
# def access_level_id(id):
#    sql = "SELECT access_level_id, name, description FROM access_levels WHERE access_level_id=" + id
#    return get_results(sql)

@app.route('/api/bids', methods=['GET'])
def bids():
   sql = "SELECT b.bid_id, b.company_id, c.business_name AS business_name, b.project_site_id, p.address, p.city, p.state_id, s.name AS state, b.sku_id, sk.name AS sku_name, b.bid_date, b.description, CAST(b.amount AS CHAR) AS amount, b.approve, b.denied FROM bids AS b, companies AS c, project_sites AS p, sku AS sk, states AS s WHERE b.company_id=c.company_id AND b.project_site_id=p.project_site_id AND b.sku_id=sk.sku_id AND p.state_id=s.state_id ORDER BY b.bid_id"
   return get_results(sql)

@app.route('/api/bids/id', methods=['GET'])
def bid_by_id():
   if 'id' in request.args:
      sql = "SELECT b.bid_id, b.company_id, c.business_name AS business_name, b.project_site_id, p.address, p.city, p.state_id, s.name AS state, b.sku_id, sk.name AS sku_name, b.bid_date, b.description, CAST(b.amount AS CHAR) AS amount, b.approve, b.denied FROM bids AS b, companies AS c, project_sites AS p, sku AS sk, states AS s WHERE b.company_id=c.company_id AND b.project_site_id=p.project_site_id AND b.sku_id=sk.sku_id AND p.state_id=s.state_id AND b.bid_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/bids', methods=['POST'])
def bid_add():
   sql = "INSERT INTO bids (company_id, project_site_id, sku_id, bid_date, description, amount, approve, denied) VALUES (" + request.args['company_id'] + ", " + request.args['project_site_id'] + ", " + request.args['sku_id'] + ", " + request.args['bid_date'] + ", " + request.args['description'] + ", " + request.args['amount'] + ", " + request.args['approve'] + ", " + request.args['denied'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/bids/id', methods=['PUT'])
def bid_update():
   if 'id' in request.args:
      sql = "UPDATE bids SET company_id=" + request.args['company_id'] + ", " + "project_site_id=" + request.args['project_site_id'] + ", " + "sku_id=" + request.args['sku_id'] + ", " + "description=" + request.args['description'] + ", " + "amount=" + request.args['amount'] + ", " + "approve=" + request.args['approve'] + ", " + "denied=" + request.args['denied'] + " WHERE bid_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/bids/', methods=['DELETE'])
def bid_delete():
   if 'id' in request.args:
      sql = "DELETE FROM bids WHERE bid_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/changelogs', methods=['GET'])
def changelogs():
   sql = "SELECT c.changelog_id, c.changelog_category_id, l.name, c.timestamp, c.description, c.complete FROM changelogs AS c, changelog_categories AS l WHERE c.changelog_category_id=l.changelog_category_id ORDER BY c.changelog_id"
   return get_results(sql)

@app.route('/api/changelogs/id', methods=['GET'])
def changelog_by_id():
   if 'id' in request.args:
      sql = "SELECT c.changelog_id, c.changelog_category_id, l.name, c.timestamp, c.description, c.complete FROM changelogs AS c, changelog_categories AS l WHERE c.changelog_category_id=l.changelog_category_id AND c.changelog_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/changelog_categories', methods=['GET'])
def changelog_categories():
   sql = "SELECT changelog_category_id, name FROM changelog_categories"
   return get_results(sql)

@app.route('/api/changelog_categories/id', methods=['GET'])
def changelog_category_by_id():
   if 'id' in request.args:
      sql = "SELECT changelog_category_id, name FROM changelog_categories WHERE changelog_category_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/clients', methods=['GET'])
def clients():
   sql = "SELECT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, states AS s WHERE c.company_category_id=1 AND c.state_id=s.state_id"
   return get_results(sql)

@app.route('/api/clients/id', methods=['GET'])
def client_by_id():
   sql = "SELECT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, states AS s WHERE c.company_id=" + request.args['id'] + "c.company_category_id=1 AND c.state_id=s.state_id"
   return get_results(sql)

@app.route('/api/clients', methods=['POST'])
def client_add():
   sql = "INSERT INTO companies (company_category_id, business_name, contact_name, address, city, state_id, zipcode, phone, fax, email) VALUES (" + request.args['company_category_id'] + ", " + request.args['business_name'] + ", " + request.args['contact_name'] + ", " + request.args['address'] + ", " + request.args['city'] + ", " + request.args['state_id'] + ", " + request.args['zipcode'] + ", " + request.args['phone'] + ", " + request.args['fax'] + ", " + request.args['email'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/clients/id', methods=['PUT'])
def client_update():
   if 'id' in request.args:
      sql = "UPDATE companies SET company_category_id=" + request.args['company_category_id'] + ", business_name=" + request.args['business_name'] + ", contact_name=" + request.args['contact_name'] + ", address=" + request.args['address'] + ", city=" + request.args['city'] + ", state_id=" + request.args['state_id'] + ", zipcode=" + request.args['zipcode'] + ", phone=" + request.args['phone'] + ", fax=" + request.args['fax'] + ", email=" + request.args['email'] + " WHERE company_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/clients', methods=['DELETE'])
def client_delete():
   if 'id' in request.args:
      sql = "DELETE FROM companies WHERE company_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/companies', methods=['GET'])
def companies():
   sql = "SELECT c.company_id, c.company_category_id, cat.name, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, company_categories AS cat, states AS s WHERE c.state_id=s.state_id AND c.company_category_id=cat.company_category_id"
   return get_results(sql)

@app.route('/api/companies/id', methods=['GET'])
def company_by_id():
   if 'id' in request.args:
      sql = "SELECT c.company_id, c.company_category_id, cat.name, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, company_categories AS cat, states AS s WHERE c.state_id=s.state_id AND c.company_category_id=cat.company_category_id AND c.company_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/company_categories', methods=['GET'])
def company_categories():
   sql = "SELECT company_category_id, name FROM company_categories ORDER BY company_category_id"
   return get_results(sql)

@app.route('/api/company_categories/id', methods=['GET'])
def company_category_by_id():
   if 'id' in request.args:
      sql = "SELECT company_category_id, name FROM company_categories WHERE company_category_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/expenses', methods=['GET'])
def expenses():
   sql = "SELECT e.expense_id, e.invoice_id, e.company_id, c.business_name, e.expense_category_id, ec.name AS expense_category, e.name, e.vehicle_id, v.man_year, v.make, v.model, e.pdate, e.name, e.quantity, CAST(e.amount AS CHAR) AS amount, CAST(e.subtotal AS CHAR) AS subtotal, e.tax_included, CAST(e.tax AS CHAR) AS tax, CAST(e.total AS CHAR) AS total, e.receipt_reference, e.receipt_image FROM expenses AS e, invoices AS i, companies AS c, expense_categories AS ec, vehicles AS v WHERE e.invoice_id=i.invoice_id AND e.company_id=c.company_id AND e.expense_category_id=ec.expense_category_id AND e.vehicle_id=v.vehicle_id ORDER BY e.expense_id"
   return get_results(sql)

@app.route('/api/expenses/id', methods=['GET'])
def expense_by_id():
   sql = "SELECT e.expense_id, e.invoice_id, e.company_id, c.business_name, e.expense_category_id, ec.name AS expense_catagory, e.vehicle_id, v.man_year, v.make, v.model, e.pdate, e.name, e.quantity, CAST(e.amount AS CHAR) AS amount, CAST(e.subtotal AS CHAR) AS subtotal, e.tax_included, CAST(e.tax AS CHAR) AS tax, CAST(e.total AS CHAR) AS total, e.receipt_reference, e.receipt_image FROM expenses AS e, invoices AS i, companies AS c, expense_categories AS ec, vehicles AS v WHERE e.invoice_id=i.invoice_id AND e.company_id=c.company_id AND e.expense_category_id=ec.expense_category_id AND e.vehicle_id=v.vehicle_id AND e.expense_id=" + request.args['id']
   return get_results(sql)

@app.route('/api/expenses', methods=['POST'])
def project_site_add():
   sql = "INSERT INTO expenses (invoice_id, company_id, expense_category_id, vehicle_id, pdate, name, quantity, amount, subtotal, tax_included, tax, total, receipt_reference, receipt_image) VALUES (" + request.args['invoice_id'] + ", " + request.args['company_id'] + ", " + request.args['expense_category_id'] + ", " + request.args['vehicle_id'] + ", " + request.args['pdate'] + ", " + request.args['name'] + ", " + request.args['quantity'] + ", " + request.args['amount'] + ", " + request.args['subtotal'] + ", " + request.args['tax_included'] + ", " + request.args['tax'] + ", " + request.args['total'] + ", " + request.args['receipt_reference'] + ", " + request.args['receipt_image'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/expenses/id', methods=['PUT'])
def project_site_update():
   if 'id' in request.args:
      sql = "UPDATE expenses SET invoice_id=" + request.args['invoice_id'] + ", company_id=" + request.args['company_id'] + ", expense_category_id=" + request.args['expense_category_id'] + ", vehicle_id=" + request.args['vehicle_id'] + ", pdate=" + request.args['pdate'] + ", name=" + request.args['name'] + ", quantity=" + request.args['quantity'] + ", amount=" + request.args['amount'] + ", subtotal=" + request.args['subtotal'] + ", tax_included=" + request.args['tax_included'] + ", tax=" + request.args['tax'] + ", total=" + request.args['total'] + ", receipt_reference=" + request.args['receipt_reference'] + ", receipt_image=" + request.args['receipt_image'] + " WHERE expense_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/expenses', methods=['DELETE'])
def project_site_delete(index):
   if 'id' in request.args:
      sql = "DELETE FROM expenses WHERE expense_id=" + index
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/expense_categories', methods=['GET'])
def expense_categories():
   sql = "SELECT expense_category_id, name, description FROM expense_categories"
   return get_results(sql)

@app.route('/api/expense_categories/id', methods=['GET'])
def expense_category_by_id():
   if 'id' in request.args:
      sql = "SELECT expense_category_id, name, description FROM expense_categories WHERE expense_category_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/invoices', methods=['GET'])
def invoices():
   sql = "SELECT DISTINCT i.invoice_id, i.company_id, c.business_name AS business_name, i.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, i.sku_id, sk.name AS sku_name, i.bid_id, i.term_id, i.start_date, i.end_date, i.description, CAST(i.amount AS CHAR) AS amount, i.receipts, i.images, i.image_links, i.mileage_id, CAST(i.loan_amount AS CHAR) AS loan_amount, i.loan_paid, CAST(i.interest_amount AS CHAR) AS interest_amount, i.interest_paid, i.complete, i.paid, i.paid_checknum, i.paid_date, CAST(i.project_cost AS CHAR) AS project_cost, CAST(i.save_tax AS CHAR) AS save_tax, CAST(i.actual_net AS CHAR) AS actual_net FROM invoices AS i, companies AS c, project_sites AS p, sku AS sk, states AS s, mileage AS m WHERE i.company_id=c.company_id AND i.project_site_id=p.project_site_id AND i.sku_id=sk.sku_id AND p.state_id=s.state_id ORDER BY i.invoice_id"
   return get_results(sql)

@app.route('/api/invoices/outstanding', methods=['GET'])
def invoices_outstanding():
   sql = "SELECT i.invoice_id, i.start_date, i.end_date, p.address, p.city, p.state_id, s.name AS state, p.zipcode, sk.name AS sku_name, CAST(i.amount AS CHAR) AS amount, i.complete FROM invoices AS i, project_sites AS p, sku AS sk, states AS s WHERE i.paid=0 AND i.project_site_id=p.project_site_id AND i.sku_id=sk.sku_id AND p.state_id=s.state_id ORDER BY i.invoice_id"
   return get_results(sql)

@app.route('/api/invoices/id', methods=['GET'])
def invoices_by_id():
   if 'id' in request.args:
      sql = "SELECT i.invoice_id, i.company_id, c.business_name, i.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, i.sku_id, i.bid_id, i.term_id, i.start_date, i.end_date, i.description, CAST(i.amount AS CHAR) AS amount, i.receipts, i.images, i.image_links, i.mileage_id, CAST(i.loan_amount AS CHAR) AS loan_amount, i.loan_paid, CAST(i.interest_amount AS CHAR) AS interest_amount, i.interest_paid, i.complete, i.paid, i.paid_checknum, i.paid_date, CAST(i.project_cost AS CHAR) AS project_cost, CAST(i.save_tax AS CHAR) AS save_tax, CAST(i.actual_net AS CHAR) AS actual_net FROM invoices AS i, companies AS c, project_sites AS p, states AS s, mileage AS m WHERE i.company_id=c.company_id AND i.project_site_id=p.project_site_id AND p.state_id=s.state_id AND i.invoice_id=" + request.args['id'] + " LIMIT 1"
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/invoices', methods=['POST'])
def project_site_add():
   sql = "INSERT INTO invoices (company_id, sku_id, project_site_id, bid_id, term_id, start_date, end_date, description, amount, receipts, images, image_links, mileage_id, loan_amount, loan_paid, interest_amount, interest_paid, complete, paid, paid_checknum, paid_date, project_cost, save_tax, actual_net) VALUES (" + request.args['company_id'] + ", " + request.args['sku_id'] + ", " + request.args['project_site_id'] + ", " + request.args['bid_id'] + ", " + request.args['term_id'] + ", " + request.args['start_date'] + ", " + request.args['end_date'] + ", " + request.args['description'] + ", " + request.args['amount'] + ", " + request.args['receipts'] + ", " + request.args['images'] + ", " + request.args['image_links'] + ", " + request.args['mileage_id'] + ", " + request.args['loan_amount'] + ", " + request.args['loan_paid'] + ", " + request.args['interest_amount'] + ", " + request.args['interest_paid'] + ", " + request.args['complete'] + ", " + request.args['paid'] + ", " + request.args['paid_checknum'] + ", " + request.args['paid_date'] + ", " + request.args['project_cost'] + ", " + request.args['save_tax'] + ", " + request.args['actual_net'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/invoices/id', methods=['PUT'])
def project_site_update():
   if 'id' in request.args:
      sql = "UPDATE invoices SET company_id=" + request.args['company_id'] + ", sku_id=" + request.args['sku_id'] + ", project_site_id=" + request.args['project_site_id'] + ", bid_id=" + request.args['bid_id'] + ", term_id=" + request.args['term_id'] + ", start_date=" + request.args['start_date'] + ", end_date=" + request.args['end_date'] + ", description=" + request.args['description'] + ", amount=" + request.args['amount'] + ", receipts=" + request.args['receipts'] + ", images=" + request.args['images'] + ", image_links=" + request.args['image_links'] + ", mileage_id=" + request.args['mileage_id'] + ", loan_amount=" + request.args['loan_amount'] + ", loan_paid=" + request.args['loan_paid'] + ", interest_amount=" + request.args['interest_amount'] + ", interest_paid=" + request.args['interest_paid'] + ", complete=" + request.args['complete'] + ", paid=" + request.args['paid'] + ", paid_checknum=" + request.args['paid_checknum'] + ", paid_date=" + request.args['paid_date'] + ", project_cost=" + request.args['project_cost'] + ", save_tax=" + request.args['save_tax'] + ", actual_net=" + request.args['actual_net'] + "WHERE invoice_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/invoices', methods=['DELETE'])
def project_site_delete(index):
   if 'id' in request.args:
      sql = "DELETE FROM invoices WHERE invoice_id=" + index
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/mileages', methods=['GET'])
def mileages():
   sql = "SELECT m.mileage_id, m.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, m.vehicle_id, v.man_year, v.make, v.model, m.invoice_id1, m.invoice_id2, m.invoice_id3, m.drive_date, m.start_mileage, m.end_mileage, m.subtotal, m.notes FROM mileage AS m, project_sites AS p, vehicles AS v, states AS s WHERE m.project_site_id=p.project_site_id AND p.state_id=s.state_id AND m.vehicle_id=v.vehicle_id ORDER BY m.mileage_id"
   return get_results(sql)

@app.route('/api/mileages/id', methods=['GET'])
def mileage_by_id():
   if 'id' in request.args:
      sql = "SELECT m.mileage_id, m.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, m.vehicle_id, v.man_year, v.make, v.model, m.invoice_id1, m.invoice_id2, m.invoice_id3, m.drive_date, m.start_mileage, m.end_mileage, m.subtotal, m.notes FROM mileage AS m, project_sites AS p, vehicles AS v, states AS s WHERE m.project_site_id=p.project_site_id AND p.state_id=s.state_id AND m.vehicle_id=v.vehicle_id AND m.mileage_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/mileages', methods=['POST'])
def project_site_add():
   sql = "INSERT INTO mileages (project_site_id, vehicle_id, invoice_id1, invoice_id2, invoice_id3, drive_date, start_mileage, end_mileage, subtotal, notes) VALUES (" + request.args['project_site_id'] + ", " + request.args['vehicle_id'] + ", " + request.args['invoice_id1'] + ", " + request.args['invoice_id2'] + ", " + request.args['invoice_id3'] + ", " + request.args['drive_date'] + ", " + request.args['start_mileage'] + ", " + request.args['end_mileage'] + ", " + request.args['subtotal'] + ", " + request.args['notes'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/mileages/id', methods=['PUT'])
def project_site_update():
   if 'id' in request.args:
      sql = "UPDATE mileages SET project_site_id=" + request.args['project_site_id'] + ", vehicle_id=" + request.args['vehicle_id'] + ", invoice_id1=" + request.args['invoice_id1'] + ", invoice_id2=" + request.args['invoice_id2'] + ", invoice_id3=" + request.args['invoice_id3'] + ", drive_date=" + request.args['drive_date'] + ", start_mileage=" + request.args['start_mileage'] + ", end_mileage=" + request.args['end_mileage'] + ", subtotal=" + request.args['subtotal'] + ", notes=" + request.args['notes'] + "WHERE mileage_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/mileages', methods=['DELETE'])
def project_site_delete(index):
   if 'id' in request.args:
      sql = "DELETE FROM mileages WHERE mileage_id=" + index
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/project_sites', methods=['GET'])
def project_sites():
   sql = "SELECT p.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, p.access_code, p.map_link FROM project_sites AS p, states AS s WHERE p.state_id=s.state_id"
   return get_results(sql)

@app.route('/api/project_sites/id', methods=['GET'])
def project_site_by_id():
   if 'id' in request.args:
      sql = "SELECT p.project_site_id, p.address, p.city, s.name AS state, p.zipcode, p.access_code, p.map_link FROM project_sites AS p, states AS s WHERE p.state_id=s.state_id AND p.project_site_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/project_sites', methods=['POST'])
def project_site_add():
   sql = "INSERT INTO project_sites (address, city, state_id, zipcode, access_code, map_link) VALUES (" + request.args['address'] + ", " + request.args['city'] + ", " + request.args['state_id'] + ", " + request.args['zipcode'] + ", " + request.args['access_code'] + ", " + request.args['map_link'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/project_sites/id', methods=['PUT'])
def project_site_update():
   if 'id' in request.args:
      sql = "UPDATE project_sites SET address=" + request.args['address'] + ", " + "city=" + request.args['city'] + ", " + "state_id=" + request.args['state_id'] + ", " + "zipcode=" + request.args['zipcode'] + ", " + "access_code=" + request.args['access_code'] + ", " + "map_link=" + request.args['map_link'] + "WHERE bid_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/project_sites/', methods=['DELETE'])
def project_site_delete(index):
   if 'id' in request.args:
      sql = "DELETE FROM project_sites WHERE project_site_id=" + index
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/skus', methods=['GET'])
def skus():
   sql = "SELECT sku_id, name, description FROM sku"
   return get_results(sql)

@app.route('/api/sku/id', methods=['GET'])
def sku_by_id():
   if 'id' in request.args:
      sql = "SELECT sku_id, name, description FROM sku WHERE sku_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/states', methods=['GET'])
def states():
   sql = "SELECT state_id, name, abbreviation FROM states"
   return get_results(sql)

@app.route('/api/states/id', methods=['GET'])
def state_by_id():
   if 'id' in request.args:
      sql = "SELECT state_id, name, abbreviation FROM states WHERE state_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/terms', methods=['GET'])
def terms():
   sql = "SELECT term_id, name FROM terms ORDER BY term_id"
   return get_results(sql)
   

@app.route('/api/terms/id', methods=['GET'])
def term_by_id():
   if 'id' in request.args:
      sql = "SELECT term_id, name FROM terms WHERE term_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/users', methods=['GET'])
def users():
   sql = "SELECT u.user_id, u.username, u.password, u.access_level_id, a.name, u.company_id, c.business_name, u.name, u.phone, u.phone_extension, u.email FROM users AS u, access_levels AS a, companies AS c WHERE u.access_level_id=a.access_level_id AND u.company_id=c.company_id ORDER BY u.user_id"
   return get_results(sql)

@app.route('/api/users/id', methods=['GET'])
def user_by_id():
   if 'id' in request.args:
      sql = "SELECT u.user_id, u.username, u.password, u.access_level_id, a.name, u.company_id, c.business_name, u.name, u.phone, u.phone_extension, u.email FROM users AS u, access_levels AS a, companies AS c WHERE u.access_level_id=a.access_level_id AND u.company_id=c.company_id AND u.user_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/vehicles', methods=['GET'])
def vehicles():
   sql = "SELECT vehicle_id, man_year, make, model, submodel, engine, notes FROM vehicles ORDER BY vehicle_id"
   return get_results(sql)

@app.route('/api/vehicles/id', methods=['GET'])
def vehicle_by_id():
   if 'id' in request.args:
      sql = "SELECT vehicle_id, man_year, make, model, submodel, engine, notes FROM vehicles WHERE vehicle_id=" + request.args['id']
      return get_results(sql)
   else:
       return errorMessage

@app.route('/api/vehicles', methods=['POST'])
def vendor_add():
   sql = "INSERT INTO vehicles (vehicle_id, man_year, make, model, submodel, engine, notes) VALUES (" + request.args['vehicle_id'] + ", " + request.args['man_year'] + ", " + request.args['make'] + ", " + request.args['model'] + ", " + request.args['submodel'] + ", " + request.args['engine'] + ", " + request.args['notes'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/vehicles/id', methods=['PUT'])
def vendors_update():
   if 'id' in request.args:
      sql = "UPDATE vehicles SET man_year=" + request.args['man_year'] + ", " + "make=" + request.args['make'] + ", " + "model=" + request.args['model'] + ", " + "submodel=" + request.args['submodel'] + ", " + "engine=" + request.args['engine'] + ", " + "notes=" + request.args['notes'] + "WHERE vehicle_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/vehicles/id', methods=['DELETE'])
def vendors_delete():
   if 'id' in request.args:
      sql = "DELETE FROM vehicles WHERE vehicle_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/vendors', methods=['GET'])
def vendors():
   sql = "SELECT DISTINCT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.website FROM companies AS c, company_categories AS cat, states AS s WHERE c.company_category_id=2 AND c.state_id=s.state_id"
   return get_results(sql)

@app.route('/api/vendors/id', methods=['GET'])
def vendor_by_id():
   sql = "SELECT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.website FROM companies AS c, company_categories AS cat, states AS s WHERE c.company_id=" + request.args['id'] + "c.company_category_id=2 AND c.state_id=s.state_id"
   return get_results(sql)

@app.route('/api/vendors', methods=['POST'])
def vendor_add():
   sql = "INSERT INTO companies (company_category_id, business_name, contact_name, address, city, state_id, zipcode, phone, fax, email, website) VALUES (" + request.args['company_category_id'] + ", " + request.args['business_name'] + ", " + request.args['contact_name'] + ", " + request.args['address'] + ", " + request.args['city'] + ", " + request.args['state_id'] + ", " + request.args['zipcode'] + ", " + request.args['phone'] + ", " + request.args['fax'] + ", " + request.args['email'] + ", " + request.args['website'] + ")"
   send_result(sql)
   return send_result(sql)

@app.route('/api/vendors/id', methods=['PUT'])
def vendors_update():
   if 'id' in request.args:
      sql = "UPDATE companies SET company_category_id=" + request.args['company_category_id'] + ", " + "business_name=" + request.args['business_name'] + ", " + "contact_name=" + request.args['contact_name'] + ", " + "address=" + request.args['address'] + ", " + "city=" + request.args['city'] + ", " + "state_id=" + request.args['state_id'] + ", " + "zipcode=" + request.args['zipcode'] + ", " + "phone=" + request.args['phone'] + ", " + "fax=" + request.args['fax'] + ", " + "email=" + request.args['email'] + ", " + "website=" + request.args['website'] + "WHERE company_id=" + request.args['id']
      send_result(sql)
   else:
       return errorMessage

@app.route('/api/vendors/id', methods=['DELETE'])
def vendors_delete():
   if 'id' in request.args:
      sql = "DELETE FROM companies WHERE company_id=" + request.args['id']
      print("sql: " + sql)
   else:
       return errorMessage

def date_serializer(d):
   if isinstance(d, datetime.date):
      return "{}-{}-{}".format(d.month, d.day, d.year)

def get_results(sql):
   connection = mariadb.connect(**config)
   cursor = connection.cursor()
   cursor.execute(sql)
   row_headers=[x[0] for x in cursor.description]
   rv = cursor.fetchall()
   json_data=[]
   for result in rv:
        json_data.append(dict(zip(row_headers,result)))

   return json.dumps(json_data, default = date_serializer)

def send_result(sql):
   connection = mariadb.connect(**config)
   cursor = connection.cursor()
   cursor.execute(sql)
   connection.commit()


app.run()