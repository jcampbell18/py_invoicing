# import necessary packages
import flask
from flask_restful import Resource, Api
import json
import datetime
import mariadb

# create the flask app
app = flask.Flask(__name__)
app.config["DEBUG"] = True

config = {
    'host': '127.0.0.1',
    'port': 3306,
    'user': 'root',
    'password': 'Password123!',
    'database': 'invoicing'
}

@app.route('/api/access_levels', methods=['GET'])
def Accesslevels():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT access_level_id, name, description FROM access_levels ORDER BY access_level_id")
   return GetResults(conn, cur)

@app.route('/api/access_levels/id', methods=['GET'])
def AccesslevelsById(access_level_id):
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT name, description FROM access_levels WHERE access_level_id=" + access_level_id)
   return GetResults(conn, cur)

@app.route('/api/bids', methods=['GET'])
def Bids():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT b.bid_id, b.company_id, c.business_name AS business_name, b.project_site_id, p.address, p.city, p.state_id, s.name AS state, b.sku_id, sk.name AS sku_name, b.bid_date, b.description, b.amount, b.approve, b.denied FROM bids AS b, companies AS c, project_sites AS p, sku AS sk, states AS s WHERE b.company_id=c.company_id AND b.project_site_id=p.project_site_id AND b.sku_id=sk.sku_id AND p.state_id=s.state_id ORDER BY b.bid_id")
   return GetResults(conn, cur)

@app.route('/api/changelogs', methods=['GET'])
def Changelogs():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT c.changelog_id, c.changelog_category_id, l.name, c.timestamp, c.description, c.complete FROM changelogs AS c, changelog_categories AS l WHERE c.changelog_category_id=l.changelog_category_id ORDER BY c.changelog_id")
   return GetResults(conn, cur)

@app.route('/api/changelog_categories', methods=['GET'])
def ChangelogCategories():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT changelog_category_id, name FROM changelog_categories")
   return GetResults(conn, cur)

@app.route('/api/companies', methods=['GET'])
def Companies():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT c.company_id, c.company_category_id, cat.name, c.business_name, c.contact_name, c.address, c.city, c.state_id, s.name AS state, c.zipcode, c.phone, c.fax, c.email, c.website, c.logo_image FROM companies AS c, company_categories AS cat, states AS s WHERE c.state_id=s.state_id AND c.company_category_id=cat.company_category_id")
   return GetResults(conn, cur)

@app.route('/api/company_categories', methods=['GET'])
def CompanyCategories():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT company_category_id, name FROM company_categories ORDER BY company_category_id")
   return GetResults(conn, cur)

@app.route('/api/expenses', methods=['GET'])
def Expenses():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT e.expense_id, e.invoice_id, e.company_id, c.business_name, e.expense_category_id, ec.name, e.vehicle_id, v.man_year, v.make, v.model, e.pdate, e.name, e.quantity, e.amount, e.subtotal, e.tax_included, e.tax, e.total, e.receipt_reference, e.receipt_image FROM expenses AS e, invoices AS i, companies AS c, expense_categories AS ec, vehicles AS v WHERE e.invoice_id=i.invoice_id AND e.company_id=c.company_id AND e.expense_category_id=ec.expense_category_id AND e.vehicle_id=v.vehicle_id ORDER BY e.expense_id")
   return GetResults(conn, cur)

@app.route('/api/expense_categories', methods=['GET'])
def ExpenseCategories():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT expense_category_id, name, description FROM expense_categories")
   return GetResults(conn, cur)

@app.route('/api/invoices', methods=['GET'])
def Invoices():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT i.invoice_id, i.company_id, c.business_name, i.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, i.sku_id, i.bid_id, i.term_id, i.start_date, i.end_date, i.description, i.amount, i.receipts, i.images, i.image_links, i.mileage_id, i.loan_amount, i.loan_paid, i.interest_amount, i.interest_paid, i.complete, i.paid, i.paid_checknum, i.paid_date, i.project_cost, i.save_tax, i.actual_net FROM invoices AS i, companies AS c, project_sites AS p, states AS s, mileage AS m WHERE i.company_id=c.company_id AND i.project_site_id=p.project_site_id AND p.state_id=s.state_id ORDER BY i.invoice_id")
   #cur.execute("SELECT i.invoice_id, i.company_id, c.business_name, i.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, i.sku_id, sk.name AS sku_name, i.bid_id, i.term_id, t.name AS term_name, i.start_date, i.end_date, i.description, i.amount, i.receipts, i.images, i.image_links, i.mileage_id, i.loan_amount, i.loan_paid, i.interest_amount, i.interest_paid, i.complete, i.paid, i.paid_checknum, i.paid_date, i.project_cost, i.save_tax, i.actual_net FROM invoices AS i, companies AS c, project_sites AS p, states AS s, sku AS sk, bids AS b, terms AS t, mileage AS m WHERE i.company_id=c.company_id AND i.project_site_id=p.project_site_id AND i.sku_id=sk.sku_id AND i.term_id=t.term_id AND p.state_id=s.state_id ORDER BY i.invoice_id")
   return GetResults(conn, cur)

@app.route('/api/mileage', methods=['GET'])
def Mileage():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT m.mileage_id, m.project_site_id, p.address, p.city, p.state_id, s.name AS state, p.zipcode, m.vehicle_id, v.man_year, v.make, v.model, m.invoice_id1, m.invoice_id2, m.invoice_id3, m.drive_date, m.start_mileage, m.end_mileage, m.subtotal, m.notes FROM mileage AS m, project_sites AS p, vehicles AS v, states AS s WHERE m.project_site_id=p.project_site_id AND p.state_id=s.state_id AND m.vehicle_id=v.vehicle_id ORDER BY m.mileage_id")
   return GetResults(conn, cur)

@app.route('/api/project_sites', methods=['GET'])
def ProjectSites():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT p.project_site_id, p.address, p.city, s.name AS state, p.zipcode, p.access_code, p.map_link FROM project_sites AS p, states AS s WHERE p.state_id=s.state_id")
   return GetResults(conn, cur)

@app.route('/api/sku', methods=['GET'])
def Sku():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT sku_id, name, description FROM sku")
   return GetResults(conn, cur)

@app.route('/api/states', methods=['GET'])
def States():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT state_id, name, abbreviation FROM states")
   return GetResults(conn, cur)

@app.route('/api/terms', methods=['GET'])
def Terms():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT term_id, name FROM terms")
   return GetResults(conn, cur)

@app.route('/api/users', methods=['GET'])
def Users():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT u.user_id, u.username, u.password, u.access_level_id, a.name, u.company_id, c.business_name, u.name, u.phone, u.phone_extension, u.email FROM users AS u, access_levels AS a, companies AS c WHERE u.access_level_id=a.access_level_id AND u.company_id=c.company_id ORDER BY u.user_id")
   return GetResults(conn, cur)

@app.route('/api/vehicles', methods=['GET'])
def Vehicles():
   conn = mariadb.connect(**config)
   cur = conn.cursor()
   cur.execute("SELECT vehicle_id, man_year, make, model, submodel, engine, notes FROM vehicles ORDER BY vehicle_id")
   return GetResults(conn, cur)


def dateSerializer(d):
   if isinstance(d, datetime.date):
      return "{}-{}-{}".format(d.month, d.day, d.year)
      #return d.__str__()

def GetResults(conn, cur):
   row_headers=[x[0] for x in cur.description]
   rv = cur.fetchall()
   json_data=[]
   for result in rv:
        json_data.append(dict(zip(row_headers,result)))

   return json.dumps(json_data, default = dateSerializer)

app.run()