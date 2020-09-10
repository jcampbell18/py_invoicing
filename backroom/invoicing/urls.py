from django.urls import path
from . import views

urlpatterns = [
    path('', views.expense_categories_show, name = 'expense_categories_show'),
]