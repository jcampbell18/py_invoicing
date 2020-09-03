from django.db import models

# Create your models here.
class AccessLevel(models.Model):
    name = models.TextField(max_length = 50)
    description = models.TextField(max_length = 250)