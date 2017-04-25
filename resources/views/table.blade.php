@extends('main')
@section('body')
<div class="wrapper">
  
  <div class="table">
    
    <div class="row header">
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Age
      </div>
      <div class="cell">
        Occupation
      </div>
      <div class="cell">
        Location
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        Luke Peters
      </div>
      <div class="cell">
        25
      </div>
      <div class="cell">
        Freelance Web Developer
      </div>
      <div class="cell">
        Brookline, MA
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        Joseph Smith
      </div>
      <div class="cell">
        27
      </div>
      <div class="cell">
        Project Manager
      </div>
      <div class="cell">
        Somerville, MA
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        Maxwell Johnson
      </div>
      <div class="cell">
        26
      </div>
      <div class="cell">
        UX Architect & Designer
      </div>
      <div class="cell">
        Arlington, MA
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        Harry Harrison
      </div>
      <div class="cell">
        25
      </div>
      <div class="cell">
        Front-End Developer
      </div>
      <div class="cell">
        Boston, MA
      </div>
    </div>
    
  </div>
  
  <div class="table">
    
    <div class="row header green">
      <div class="cell">
        Product
      </div>
      <div class="cell">
        Unit Price
      </div>
      <div class="cell">
        Quantity
      </div>
      <div class="cell">
        Date Sold
      </div>
      <div class="cell">
        Status
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        Solid oak work table
      </div>
      <div class="cell">
        $800
      </div>
      <div class="cell">
        10
      </div>
      <div class="cell">
        03/15/2014
      </div>
      <div class="cell">
        Waiting for Pickup
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        Leather iPhone wallet
      </div>
      <div class="cell">
        $45
      </div>
      <div class="cell">
        120
      </div>
      <div class="cell">
        02/28/2014
      </div>
      <div class="cell">
        In Transit
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        27" Apple Thunderbolt displays
      </div>
      <div class="cell">
        $1000
      </div>
      <div class="cell">
        25
      </div>
      <div class="cell">
        02/10/2014
      </div>
      <div class="cell">
        Delivered
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        Bose studio headphones
      </div>
      <div class="cell">
        $60
      </div>
      <div class="cell">
        90
      </div>
      <div class="cell">
        01/14/2014
      </div>
      <div class="cell">
        Delivered
      </div>
    </div>
    
  </div>
  
  <div class="table">
    
    <div class="row header blue">
      <div class="cell">
        Username
      </div>
      <div class="cell">
        Email
      </div>
      <div class="cell">
        Password
      </div>
      <div class="cell">
        Active
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        ninjalug
      </div>
      <div class="cell">
        misterninja@hotmail.com
      </div>
      <div class="cell">
        ************
      </div>
      <div class="cell">
        Yes
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        jsmith41
      </div>
      <div class="cell">
        joseph.smith@gmail.com
      </div>
      <div class="cell">
        ************
      </div>
      <div class="cell">
        No
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        1337hax0r15
      </div>
      <div class="cell">
        hackerdude1000@aol.com
      </div>
      <div class="cell">
        ************
      </div>
      <div class="cell">
        Yes
      </div>
    </div>
    
    <div class="row">
      <div class="cell">
        hairyharry19
      </div>
      <div class="cell">
        harryharry@gmail.com
      </div>
      <div class="cell">
        ************
      </div>
      <div class="cell">
        Yes
      </div>
    </div>
    
  </div>
  
</div>
<style type="text/css">
	body {
  font-family: "Helvetica Neue", Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  background: #2b2b2b;
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
  max-width: 800px;
}

.table {
  margin: 0 0 40px 0;
  width: 100%;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row {
  display: table-row;
  background: #f6f6f6;
}
.row:nth-of-type(odd) {
  background: #e9e9e9;
}
.row.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
.row.green {
  background: #27ae60;
}
.row.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row {
    padding: 8px 0;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 12px;
    display: block;
  }
}

</style>
@endsection