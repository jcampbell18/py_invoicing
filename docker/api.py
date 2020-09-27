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
def Accesslevels():
   sql = "SELECT access_level_id, name, description FROM access_levels ORDER BY access_level_id"
   return GetResults(sql)

@app.route('/api/access_levels/id', methods=['GET'])
def AccesslevelsById():
   if 'id' in request.args:
      sql = "SELECT access_level_id, name, description FROM access_levels WHERE access_level_id=" + request.args['id']
      return GetResults(sql)
   else:
      return errorMessage 

@app.route('/api/access_levels/<int:id>', methods=['GET'])
def AccesslevelsId(id):
   sql = "SELECT access_level_id, name, description FROM access_levels WHERE access_level_id=" + id
   return GetResults(sql)

@app.route('/api/bids', methods=['GET'])
def Bids():
   sql = "SELECT b.bid_id, b.company_id, c.business_name AS business_name, b.project_site_id, p.address, p.city, p.state_id, s.name AS state, b.sku_id, sk.name AS sku_name, b.bid_date, b.description, CAST(b.amount AS CHAR) AS amount, b.approve, b.denied FROM bids AS b, companies AS c, project_sites AS p, sku AS sk, states AS s WHERE b.company_id=c.company_id AND b.project_site_id=p.project_site_id AND b.sku_id=sk.sku_id AND p.state_id=s.state_id ORDER BY b.bid_id"
   return GetResults(sql)

@app.route('/api/bids/id', methods=['GET'])
def BidsById():
   if 'id' in request.args:
      sql = "SELECT b.bid_id, b.company_id, c.business_name AS business_name, b.project_site_id, p.address, p.city, p.state_id, s.name AS state, b.sku_id, sk.name AS sku_name, b.bid_date, b.description, CAST(b.amount AS CHAR) AS amount, b.approve, b.denied FROM bids AS b, companies AS c, project_sites AS p, sku AS sk, states AS s WHERE b.company_id=c.company_id AND b.project_site_id=p.project_site_id AND b.sku_id=sk.sku_id AND p.state_id=s.state_id AND b.bid_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/changelogs', methods=['GET'])
def Changelogs():
   sql = "SELECT c.changelog_id, c.changelog_category_id, l.name, c.timestamp, c.description, c.complete FROM changelogs AS c, changelog_categories AS l WHERE c.changelog_category_id=l.changelog_category_id ORDER BY c.changelog_id"
   return GetResults(sql)

@app.route('/api/changelogs/id', methods=['GET'])
def ChangelogsById():
   if 'id' in request.args:
      sql = "SELECT c.changelog_id, c.changelog_category_id, l.name, c.timestamp, c.description, c.complete FROM changelogs AS c, changelog_categories AS l WHERE c.changelog_category_id=l.changelog_category_id AND c.changelog_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/changelog_categories', methods=['GET'])
def ChangelogCategories():
   sql = "SELECT changelog_category_id, name FROM changelog_categories"
   return GetResults(sql)

@app.route('/api/changelog_categories/id', methods=['GET'])
def ChangelogCategoriesById():
   if 'id' in request.args:
      sql = "SELECT changelog_category_id, name FROM changelog_categories WHERE changelog_category_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/clients', methods=['GET'])
def Clients():
   sql = "SELECT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, states AS s WHERE c.company_category_id=1 AND c.state_id=s.state_id"
   return GetResults(sql)

@app.route('/api/clients/id', methods=['GET'])
def ClientsById():
   sql = "SELECT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, states AS s WHERE c.company_id=" + request.args['id'] + "c.company_category_id=1 AND c.state_id=s.state_id"
   return GetResults(sql)

@app.route('/api/companies', methods=['GET'])
def Companies():
   sql = "SELECT c.company_id, c.company_category_id, cat.name, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, company_categories AS cat, states AS s WHERE c.state_id=s.state_id AND c.company_category_id=cat.company_category_id"
   return GetResults(sql)

@app.route('/api/companies/id', methods=['GET'])
def CompaniesById():
   if 'id' in request.args:
      sql = "SELECT c.company_id, c.company_category_id, cat.name, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, company_categories AS cat, states AS s WHERE c.state_id=s.state_id AND c.company_category_id=cat.company_category_id AND c.company_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/company_categories', methods=['GET'])
def CompanyCategories():
   sql = "SELECT company_category_id, name FROM company_categories ORDER BY company_category_id"
   return GetResults(sql)

@app.route('/api/company_categories/id', methods=['GET'])
def CompanyCategoriesById():
   if 'id' in request.args:
      sql = "SELECT company_category_id, name FROM company_categories WHERE company_category_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/expenses', methods=['GET'])
def Expenses():
   sql = "SELECT e.expense_id, e.invoice_id, e.company_id, c.business_name, e.expense_category_id, ec.name AS expense_catagory, e.name, e.vehicle_id, v.man_year, v.make, v.model, e.pdate, e.name, e.quantity, CAST(e.amount AS CHAR) AS amount, CAST(e.subtotal AS CHAR) AS subtotal, e.tax_included, CAST(e.tax AS CHAR) AS tax, CAST(e.total AS CHAR) AS total, e.receipt_reference, e.receipt_image FROM expenses AS e, invoices AS i, companies AS c, expense_categories AS ec, vehicles AS v WHERE e.invoice_id=i.invoice_id AND e.company_id=c.company_id AND e.expense_category_id=ec.expense_category_id AND e.vehicle_id=v.vehicle_id ORDER BY e.expense_id"
   return GetResults(sql)

@app.route('/api/expenses/id', methods=['GET'])
def ExpensesById():
   sql = "SELECT e.expense_id, e.invoice_id, e.company_id, c.business_name, e.expense_category_id, ec.name AS expense_catagory, e.vehicle_id, v.man_year, v.make, v.model, e.pdate, e.name, e.quantity, CAST(e.amount AS CHAR) AS amount, CAST(e.subtotal AS CHAR) AS subtotal, e.tax_included, CAST(e.tax AS CHAR) AS tax, CAST(e.total AS CHAR) AS total, e.receipt_reference, e.receipt_image FROM expenses AS e, invoices AS i, companies AS c, expense_categories AS ec, vehicles AS v WHERE e.invoice_id=i.invoice_id AND e.company_id=c.company_id AND e.expense_category_id=ec.expense_category_id AND e.vehicle_id=v.vehicle_id AND e.expense_id=" + request.args['id']
   return GetResults(sql)

@app.route('/api/expense_categories', methods=['GET'])
def ExpenseCategories():
   sql = "SELECT expense_category_id, name, description FROM expense_categories"
   return GetResults(sql)

@app.route('/api/expense_categories/id', methods=['GET'])
def ExpenseCategoriesById():
   if 'id' in request.args:
      sql = "SELECT expense_category_id, name, description FROM expense_categories WHERE expense_category_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/invoices', methods=['GET'])
def Invoices():
   sql = "SELECT DISTINCT i.invoice_id, i.company_id, c.business_name AS business_name, i.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, i.sku_id, sk.name AS sku_name, i.bid_id, i.term_id, i.start_date, i.end_date, i.description, CAST(i.amount AS CHAR) AS amount, i.receipts, i.images, i.image_links, i.mileage_id, CAST(i.loan_amount AS CHAR) AS loan_amount, i.loan_paid, CAST(i.interest_amount AS CHAR) AS interest_amount, i.interest_paid, i.complete, i.paid, i.paid_checknum, i.paid_date, CAST(i.project_cost AS CHAR) AS project_cost, CAST(i.save_tax AS CHAR) AS save_tax, CAST(i.actual_net AS CHAR) AS actual_net FROM invoices AS i, companies AS c, project_sites AS p, sku AS sk, states AS s, mileage AS m WHERE i.company_id=c.company_id AND i.project_site_id=p.project_site_id AND i.sku_id=sk.sku_id AND p.state_id=s.state_id ORDER BY i.invoice_id"
   return GetResults(sql)

@app.route('/api/invoices/outstanding', methods=['GET'])
def InvoicesOutstanding():
   sql = "SELECT i.invoice_id, i.start_date, i.end_date, p.address, p.city, p.state_id, s.name AS state, p.zipcode, sk.name AS sku_name, CAST(i.amount AS CHAR) AS amount, i.complete FROM invoices AS i, project_sites AS p, sku AS sk, states AS s WHERE i.paid=0 AND i.project_site_id=p.project_site_id AND i.sku_id=sk.sku_id AND p.state_id=s.state_id ORDER BY i.invoice_id"
   return GetResults(sql)

@app.route('/api/invoices/id', methods=['GET'])
def InvoicesById():
   if 'id' in request.args:
      sql = "SELECT i.invoice_id, i.company_id, c.business_name, i.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, i.sku_id, i.bid_id, i.term_id, i.start_date, i.end_date, i.description, CAST(i.amount AS CHAR) AS amount, i.receipts, i.images, i.image_links, i.mileage_id, CAST(i.loan_amount AS CHAR) AS loan_amount, i.loan_paid, CAST(i.interest_amount AS CHAR) AS interest_amount, i.interest_paid, i.complete, i.paid, i.paid_checknum, i.paid_date, CAST(i.project_cost AS CHAR) AS project_cost, CAST(i.save_tax AS CHAR) AS save_tax, CAST(i.actual_net AS CHAR) AS actual_net FROM invoices AS i, companies AS c, project_sites AS p, states AS s, mileage AS m WHERE i.company_id=c.company_id AND i.project_site_id=p.project_site_id AND p.state_id=s.state_id AND i.invoice_id=" + request.args['id'] + " LIMIT 1"
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/mileage', methods=['GET'])
def Mileage():
   sql = "SELECT m.mileage_id, m.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, m.vehicle_id, v.man_year, v.make, v.model, m.invoice_id1, m.invoice_id2, m.invoice_id3, m.drive_date, m.start_mileage, m.end_mileage, m.subtotal, m.notes FROM mileage AS m, project_sites AS p, vehicles AS v, states AS s WHERE m.project_site_id=p.project_site_id AND p.state_id=s.state_id AND m.vehicle_id=v.vehicle_id ORDER BY m.mileage_id"
   return GetResults(sql)

@app.route('/api/mileage/id', methods=['GET'])
def MileageById():
   if 'id' in request.args:
      sql = "SELECT m.mileage_id, m.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, m.vehicle_id, v.man_year, v.make, v.model, m.invoice_id1, m.invoice_id2, m.invoice_id3, m.drive_date, m.start_mileage, m.end_mileage, m.subtotal, m.notes FROM mileage AS m, project_sites AS p, vehicles AS v, states AS s WHERE m.project_site_id=p.project_site_id AND p.state_id=s.state_id AND m.vehicle_id=v.vehicle_id AND m.mileage_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/project_sites', methods=['GET'])
def ProjectSites():
   sql = "SELECT p.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, p.access_code, p.map_link FROM project_sites AS p, states AS s WHERE p.state_id=s.state_id"
   return GetResults(sql)

@app.route('/api/project_sites/id', methods=['GET'])
def ProjectSitesById():
   if 'id' in request.args:
      sql = "SELECT p.project_site_id, p.address, p.city, s.name AS state, p.zipcode, p.access_code, p.map_link FROM project_sites AS p, states AS s WHERE p.state_id=s.state_id AND p.project_site_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/project_sites/', methods=['POST'])
def ProjectSitesAdd():
   sql = "INSERT INTO project_sites (address, city, state_id, zipcode, access_code, map_link) VALUES(" + request.args['address'] + "," + request.args['city'] + "," + request.args['state_id'] + "," + request.args['zipcdoe'] + "," + request.args['access_code'] + "," + request.args['map_link'] + ")"
   return GetResults(sql)

@app.route('/api/project_sites/', methods=['PUT'])
def ProjectSitesUpdate(index):
   sql = "SELECT p.project_site_id, p.address, p.city, s.name AS state, p.zipcode, p.access_code, p.map_link FROM project_sites AS p, states AS s WHERE p.state_id=s.state_id"
   return GetResults(sql)

@app.route('/api/project_sites/', methods=['DELETE'])
def ProjectSitesDelete(index):
   sql = "SELECT p.project_site_id, p.address, p.city, s.name AS state, p.zipcode, p.access_code, p.map_link FROM project_sites AS p, states AS s WHERE p.state_id=s.state_id"
   return GetResults(sql)

@app.route('/api/skus', methods=['GET'])
def Skus():
   sql = "SELECT sku_id, name, description FROM sku"
   return GetResults(sql)

@app.route('/api/sku/id', methods=['GET'])
def SkuById():
   if 'id' in request.args:
      sql = "SELECT sku_id, name, description FROM sku WHERE sku_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/states', methods=['GET'])
def States():
   sql = "SELECT state_id, name, abbreviation FROM states"
   return GetResults(sql)

@app.route('/api/states/id', methods=['GET'])
def StatesById():
   if 'id' in request.args:
      sql = "SELECT state_id, name, abbreviation FROM states WHERE state_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/terms', methods=['GET'])
def Terms():
   sql = "SELECT term_id, name FROM terms ORDER BY term_id"
   return GetResults(sql)
   

@app.route('/api/terms/id', methods=['GET'])
def TermsById():
   if 'id' in request.args:
      sql = "SELECT term_id, name FROM terms WHERE term_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/users', methods=['GET'])
def Users():
   sql = "SELECT u.user_id, u.username, u.password, u.access_level_id, a.name, u.company_id, c.business_name, u.name, u.phone, u.phone_extension, u.email FROM users AS u, access_levels AS a, companies AS c WHERE u.access_level_id=a.access_level_id AND u.company_id=c.company_id ORDER BY u.user_id"
   return GetResults(sql)

@app.route('/api/users/id', methods=['GET'])
def UsersById():
   if 'id' in request.args:
      sql = "SELECT u.user_id, u.username, u.password, u.access_level_id, a.name, u.company_id, c.business_name, u.name, u.phone, u.phone_extension, u.email FROM users AS u, access_levels AS a, companies AS c WHERE u.access_level_id=a.access_level_id AND u.company_id=c.company_id AND u.user_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/vehicles', methods=['GET'])
def Vehicles():
   sql = "SELECT vehicle_id, man_year, make, model, submodel, engine, notes FROM vehicles ORDER BY vehicle_id"
   return GetResults(sql)

@app.route('/api/vehicles/id', methods=['GET'])
def VehiclesById():
   if 'id' in request.args:
      sql = "SELECT vehicle_id, man_year, make, model, submodel, engine, notes FROM vehicles WHERE vehicle_id=" + request.args['id']
      return GetResults(sql)
   else:
       return errorMessage

@app.route('/api/vendors', methods=['GET'])
def Vendors():
   sql = "SELECT DISTINCT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.website FROM companies AS c, company_categories AS cat, states AS s WHERE c.company_category_id=2 AND c.state_id=s.state_id"
   return GetResults(sql)

@app.route('/api/vendors/id', methods=['GET'])
def VendorsById():
   sql = "SELECT c.company_id, c.company_category_id, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.website FROM companies AS c, company_categories AS cat, states AS s WHERE c.company_id=" + request.args['id'] + "c.company_category_id=2 AND c.state_id=s.state_id"
   return GetResults(sql)

def dateSerializer(d):
   if isinstance(d, datetime.date):
      return "{}-{}-{}".format(d.month, d.day, d.year)

def GetResults(sql):
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute(sql)
   row_headers=[x[0] for x in cur.description]
   rv = cur.fetchall()
   json_data=[]
   for result in rv:
        json_data.append(dict(zip(row_headers,result)))

   return json.dumps(json_data, default = dateSerializer)

app.run()