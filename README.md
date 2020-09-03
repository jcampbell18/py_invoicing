# Invoicing

Background: This is an older invoicing project that is being revisited. I had completed a 4 year residential carpentry apprenticeship program and acquired my journeyman (national) license through the Home Builders Association in 2012. From that point, I branched off onto my own as a General Contractor and started contract-based jobs on bank-owned properties. I'd like to think that I am a very organzied person, so after a couple of contract jobs, I felt that I needed to come up with an invoicing system that fit my needs.  Needless to say that I did not want to spend the money to purchase Quickbooks. After discussing with my clients about their needs (and frustrations with previous contractors), I was able to form a game plan. By the way, the finished product had been written in PHP5, HTML/CSS with MYSQL database integration. 

  - Client needs:
    - access to website
    - receive bids
    - receive or view invoice
    - view or download images attached to invoice (before, during and after images of property)
    
  - My needs:
    - access to website via desktop computer or mobile
    - track expenses, vehicle usage, receipts
    - reporting system for taxes
    - dashboard to view the latest (open bids, unpaid invoices, etc)
    - create bids
    - create invoices
    - upload and attach images to invoices
    - create SKU system to avoid retyping
    - to do list for the website (changelog)
    
Current: After just graduating in August 2020 from Eastern Washington University (EWU) with a Bachelor's Degree in Computer Science and User Experience Design Certificate, I am searching for a career opportunity. Of course they want to see stuff that I have done (not homework assignments). I would be embarassed to show them this old project, so I am doing a major overhaul on it. I am attempting to do the Back-end in Golang and/or Django (as 2 separate projects). Ultimately, I will integrate Amazon Web Services into this as well.

Tools:

- Front-End Development: 
  - [ReactJS](http://reactjs.org/)
  - Javascript
  - HTML/HTML5
  - CSS/CSS3
- Back-End Development: 
  - [Django](https://www.djangoproject.com/) with [Python3](https://www.python.org/)
  - [Golang](https://golang.org/)
- Database: [MariaDB](https://mariadb.org/)
- Version Control: [Git](https://git-scm.com/)
- Cloud: [AWS](https://aws.amazon.com/)
- IDE: [Visual Studio Code](https://code.visualstudio.com/)

## Step 1. Database

### Database reDesign

#### UML

- Tool: 

  - [draw.io](https://www.diagrams.net/)

Original Database Structure
![old database design](https://github.com/jcampbell18/invoicing/blob/master/UML/DatabaseDiagram_original.jpg)

Improved Database Structure
![new database design](https://github.com/jcampbell18/invoicing/blob/master/UML/DatabaseDiagram_v1-1.jpg)

#### Script for new Database design

- Tools:

  - [XAMPP](https://www.apachefriends.org/)
  - [MYSQL Workbench](https://www.mysql.com/products/workbench/)

- Links:

  - [Create Database/Structure](https://github.com/jcampbell18/invoicing/blob/master/DatabaseScript/invoicing.sql)
  - [Populate Database with Data](https://github.com/jcampbell18/invoicing/blob/master/DatabaseScript/populateWithData.sql)

## Step 2. Create Back-End

### Django

- References:

  - [Build a REST API in 30 minutes with Django REST framework](https://medium.com/swlh/build-your-first-rest-api-with-django-rest-framework-e394e39a482c)

1. Install Python3

2. Install Git Bash

3. Update pip (a good habit to have)

  <code>python -m pip install --upgrade pip</code>

4. Setup virtual environment

  - command: python -m venv {virtual environment name}

  <code>python -m venv venv</code>

5. Activate virtual environment

  <code>source venv/Scripts/activate</code>

  - (venv) will appear on the command line to show you have activated the virtual environment

6. Install Django

  <code>pip install Django</code>

7. Start Django project

  - command: django-admin.py startproject {project name}

  <code>django-admin.py startproject backroom</code>

8. Verify it works

  - command: cd {project name}

  <code>cd backroom</code>

  <code>python manage.py runserver</code>

  - with Internet browser (e.g., Chrome)

    - go to URL: http://127.0.0.1:8000/

  - exit the server in Git Bash: Ctrl + C


### Golang

- References:

  - [Creating a RESTful API With Golang](https://tutorialedge.net/golang/creating-restful-api-with-golang/)
  - [REST API in Golang](https://golangdocs.com/rest-api-in-golang)

## Git

Git Reference: [Atlassian](https://www.atlassian.com/git/tutorials)

Git Tutorials: [Git Immersion](https://gitimmersion.com/index.html)

### Common commands used

- configuration (also in .gitconfig)
  - add/view user name

    <code>git config --global user.name</code>

  - add/view user email

    <code>git config --global user.email</code>

- cloning

  <code>git clone https://github.com/username/repository-name.git</code>

- check status

  <code>git status</code>

- staging changes
  - by filename

    <code>git add filename</code>

  - all changes

    <code>git add .</code>

- commiting changes

  <code>git commit -m "message"</code>

- uploading/pushing to repository

  <code>git push</code>

- downloading/pulling from repository

  <code>git pull</code>