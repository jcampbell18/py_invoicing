from django.shortcuts import render
from django.http import HttpResponse
from .models import Expense_Categories

# Create your views here.
def expense_categories_show(request):
    expense_category = Expense_Categories.objects.order_by('name')
    return render(request, 'invoicing/expense_categories_show.html', {'expense_categories':expense_category})