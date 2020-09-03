# Invoicing

Intro: This is an older invoicing project that is being revisited. I had completed a 4 year residential carpentry apprenticeship program and acquired my journeyman (national) license through the Home Builders Association in 2012. From that point, I branched off onto my own as a General Contractor and started contract-based jobs on bank-owned properties. I'd like to think that I am a very organzied person, so after a couple of contract jobs, I felt that I needed to come up with an invoicing system that fit my needs.  Needless to say that I did not want to spend the money to purchase Quickbooks. After discussing with my clients about their needs (and frustrations with previous contractors), I was able to form a game plan. By the way, the finished product had been written in PHP5, HTML/CSS with MYSQL database integration. 

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
    
Today: After just graduating in August 2020 from Eastern Washington University (EWU) with a Bachelor's Degree in Computer Science and User Experience Design Certificate, I am searching for a career opportunity. Of course they want to see stuff that I have done (not homework assignments). I would be embarassed to show them this old project, so I am doing a major overhaul on it. I am attempting to do the Back-end in Golang and/or Django (as 2 separate projects). Ultimately, I will integrate Amazon Web Services into this as well.

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

- Link:

  - [Create Database/Structure](https://github.com/jcampbell18/invoicing/blob/master/DatabaseScript/invoicing.sql)
  - [Populate Database with Data](https://github.com/jcampbell18/invoicing/blob/master/DatabaseScript/populateWithData.sql)

## Step 2. Create Back-End

