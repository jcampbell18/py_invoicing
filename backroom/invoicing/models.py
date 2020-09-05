from django.db import models

# Create your models here.
class Changelog_Categories(models.Model):
    changelog_category_id = models.AutoField(primary_key=True)
    name = models.CharField(max_length=45)

class Changelog(models.Model):
    changelog_id = models.AutoField(primary_key=True)
    changelog_category_id = models.ForeignKey(to='Changelog_Categories', on_update=models.CASCADE, on_delete=models.RESTRICT)
    timestamp = models.DateField()
    description = models.CharField(max_length=250)
    complete = models.IntegerField(max_length=1)

class Access_Level(models.Model):
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
    man_year = models.IntegerField(max_length=4)
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
    state_id = models.ForeignKey(to='States', on_update=models.CASCADE, on_delete=models.RESTRICT)
    zipcode = models.CharField(max_length=6)
    access_code = models.CharField(max_length=10)
    map_link = models.TextField()

class Companies(models.Model):
    company_id = models.AutoField(primary_key=True)
    company_category_id = models.ForeignKey(to='Company_Categories', on_update=models.CASCADE, on_delete=models.RESTRICT)
    business_name = models.CharField(max_length=75)
    contact_name = models.CharField(max_length=75)
    address = models.CharField(max_length=75)
    city = models.CharField(max_length=50)
    state_id = models.ForeignKey(to='States', on_update=models.CASCADE, on_delete=models.RESTRICT)
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
    access_level_id = models.ForeignKey(to='Access_Levels', on_update=models.CASCADE, on_delete=models.RESTRICT)
    company_id = models.ForeignKey(to='Companies', on_update=models.CASCADE, on_delete=models.RESTRICT)
    phone = models.CharField(max_length=14)
    phone_ext = models.CharField(max_length=6)
    email = models.CharField(max_length=45)