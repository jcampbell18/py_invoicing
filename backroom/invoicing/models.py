from django.db import models

# Create your models here.
class Changelog_Categories(models.Model):
    changelog_category_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=45)

class Changelog(models.Model):
    changelog_id = models.AutoField(primary_key=True)
    changelog_category_id = models.ForeignKey(to='Changelog_Categories', on_delete=models.RESTRICT)
    timestamp = models.DateField()
    description = models.CharField(max_length=250)
    complete = models.IntegerField()

class Access_Levels(models.Model):
    access_level_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=50)
    description = models.CharField(max_length=250)

class Expense_Categories(models.Model):
    expense_category_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=50)
    description = models.CharField(max_length=250)

class Sku(models.Model):
    sku_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=50)
    description = models.CharField(max_length=250)

class Terms(models.Model):
    term_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=150)

class Vehicles(models.Model):
    vehicle_id = models.AutoField(primary_key=True)
    man_year = models.IntegerField()
    make = models.CharField(max_length=45)
    model = models.CharField(max_length=45)
    submodel = models.CharField(max_length=45)
    engine = models.CharField(max_length=150)
    notes = models.CharField(max_length=150)

class Company_Categories(models.Model):
    company_category_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=45)

class States(models.Model):
    state_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=75)
    abbreviation = models.CharField(max_length=4)

class Project_Sites(models.Model):
    project_site_id = models.AutoField(primary_key=True)
    address = models.CharField(max_length=75)
    city = models.CharField(max_length=50)
    state_id = models.ForeignKey(to='States', on_delete=models.RESTRICT)
    zipcode = models.CharField(max_length=6)
    access_code = models.CharField(max_length=10)
    map_link = models.TextField()

class Companies(models.Model):
    company_id = models.AutoField(primary_key=True)
    company_category_id = models.ForeignKey(to='Company_Categories', on_delete=models.RESTRICT)
    business_name = models.CharField(max_length=75)
    contact_name = models.CharField(max_length=75)
    address = models.CharField(max_length=75)
    city = models.CharField(max_length=50)
    state_id = models.ForeignKey(to='States', on_delete=models.RESTRICT)
    zipcode = models.CharField(max_length=6)
    phone = models.CharField(max_length=14)
    fax = models.CharField(max_length=14)
    email = models.CharField(max_length=45)
    website = models.CharField(max_length=50)
    logo_image = models.CharField(max_length=200)

class Users(models.Model):
    user_id = models.AutoField(primary_key=True)
    username = models.CharField(max_length=25)
    password = models.CharField(max_length=128)
    access_level_id = models.ForeignKey(to='Access_Levels', on_delete=models.RESTRICT)
    company_id = models.ForeignKey(to='Companies', on_delete=models.RESTRICT)
    phone = models.CharField(max_length=14)
    phone_ext = models.CharField(max_length=6)
    email = models.CharField(max_length=45)

class Bids(models.Model):
    bid_id = models.AutoField(primary_key=True)
    company_id = models.ForeignKey(to='Companies', on_delete=models.RESTRICT)
    project_site_id = models.ForeignKey(to='Project_Sites', on_delete=models.RESTRICT)
    sku_id = models.ForeignKey(to='Sku', on_delete=models.RESTRICT)
    bid_date = models.DateField()
    description = models.TextField()
    amount = models.DecimalField(max_digits=8, decimal_places=2)
    approve = models.IntegerField()
    denied = models.IntegerField()

class Invoices(models.Model):
    invoice_id = models.AutoField(primary_key=True)
    company_id = models.ForeignKey(to='Companies', on_delete=models.RESTRICT)
    project_site_id = models.ForeignKey(to='Project_Sites', on_delete=models.RESTRICT)
    sku_id = models.ForeignKey(to='Sku', on_delete=models.RESTRICT)
    bid_id = models.ForeignKey(to='Bids', on_delete=models.RESTRICT)
    term_id = models.ForeignKey(to='Terms', on_delete=models.RESTRICT)
    start_date = models.DateField()
    end_date = models.DateField()
    description = models.TextField()
    amount = models.DecimalField(max_digits=8, decimal_places=2)
    receipts = models.IntegerField()
    images = models.IntegerField()
    image_links = models.TextField()
    mileage_id = models.ForeignKey(to='Mileage', on_delete=models.RESTRICT)
    loan_amount = models.DecimalField(max_digits=8, decimal_places=2)
    loan_paid = models.IntegerField()
    interest_amount = models.DecimalField(max_digits=8, decimal_places=2)
    interest_paid = models.IntegerField()
    complete = models.IntegerField()
    paid = models.IntegerField()
    paid_checknum = models.CharField(max_length=50)
    paid_date = models.DateField()
    project_cost = models.DecimalField(max_digits=8, decimal_places=2)
    save_tax = models.DecimalField(max_digits=8, decimal_places=2)
    actual_net = models.DecimalField(max_digits=8, decimal_places=2)

class Mileage(models.Model):
    mileage_id = models.AutoField(primary_key=True)
    project_site_id = models.ForeignKey(to='Project_Sites', on_delete=models.RESTRICT)
    vehicle_id = models.ForeignKey(to='Vehicles', on_delete=models.RESTRICT)
    invoice_id1 = models.ForeignKey(to='Invoices', on_delete=models.RESTRICT, related_name='invoice_id1')
    invoice_id2 = models.ForeignKey(to='Invoices', on_delete=models.RESTRICT, related_name='invoice_id2')
    invoice_id3 = models.ForeignKey(to='Invoices', on_delete=models.RESTRICT, related_name='invoice_id3')
    drive_date = models.DateField()
    start_mileage = models.IntegerField()
    end_milage = models.IntegerField()
    subtotal = models.IntegerField()
    notes = models.CharField(max_length=150)

class Expenses(models.Model):
    expense_id = models.AutoField(primary_key=True)
    invoice_id = models.ForeignKey(to='Invoices', on_delete=models.RESTRICT)
    company_id = models.ForeignKey(to='Companies', on_delete=models.RESTRICT)
    expense_category_id = models.ForeignKey(to='Expense_Categories', on_delete=models.RESTRICT)
    vehicle_id = models.ForeignKey(to='Vehicles', on_delete=models.RESTRICT)
    pdate = models.DateField()
    name = models.CharField(max_length=250)
    quantity = models.IntegerField()
    amount = models.DecimalField(max_digits=8, decimal_places=2)
    subtotal = models.DecimalField(max_digits=8, decimal_places=2)
    ytax = models.IntegerField()
    tax = models.DecimalField(max_digits=12, decimal_places=5)
    total = models.DecimalField(max_digits=12, decimal_places=5)
    receipt_reference = models.CharField(max_length=100)
    receipt_image = models.TextField()