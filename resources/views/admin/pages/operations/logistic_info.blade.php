@extends('admin.layouts.default')
@section('content')

<div class="col-md-12 ">
   <div class="search-box-header">
<div class="row">
                        <div class="col-sm-12" style="border-right:1px solid #ccc;">
                            <form method="get" action=" " id="searchForm">
                                <div class="btn-group pull-left col-md-12">
                                    <div class="form-group col-md-3">
                                        <input type="text" value="" name="project-name" aria-controls="editable-sample" class="form-control medium" placeholder="Project Name">

                                    </div>
                                       <div class="form-group col-md-3">
                                        <input type="text" name="client-name" value="" class="form-control  " placeholder="Client Name" autocomplete="off"  >

                                    </div>
 

                                    <div class="form-group col-md-3">
                                       <input type="text" value="" name="forwarder-name" aria-controls="editable-sample" class="form-control medium" placeholder="Forwarder Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                       <input type="text" value="" name="consignment-no" aria-controls="editable-sample" class="form-control medium" placeholder="Consignment No">
                                    </div>
                             <div class="form-group col-md-3">
                                       <input type="text" value="" name="co-ordinator" aria-controls="editable-sample" class="form-control medium" placeholder="Co-ordinator">
                                    </div>
 
 
                                     <div class="form-group col-md-3">
                                        <input type="submit" name="submit" class="btn sbtn btn-block" value="Submit">
                                    </div>


                                </div>
                            </form>

                        </div>
 
</div>
    </div>
    
    
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th style="padding:8px 0px;"><input type="checkbox" name="chk1" class="checkOrderId" value="1"> </th>
                <th >Sr No</th>
                <th>Project</th>
                <th >Product</th>
                <th >Forwarder</th>
                <th >Consignment No</th>
                <th>Mode</th>
                <th>Shipment Date</th>
                <th> Destination Date</th>
                <th>Actual Arrival Date</th>
                <th>Clearing Date</th>
                <th>Warehouse Date</th>
                <th>Actions</th>
               
            </tr>
        </thead>
        <tbody>
          
            <tr>
           
                <td><input type="checkbox" name="chk1" class="checkOrderId" value="1"> </td>
                <td style='text-align: center;'>1</td>
                <td>P_SMF_00133_RS </td>
                <td>FORW001</td>
                <td> Consi_001</td>
                <td> Air</td>
                 
                <td><input class='tbl-datepicker Datepicker' placeholder="1-Jun-15" type='text' id='Datepicker1' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="5-Jun-15" type='text' id='Datepicker2' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="5-Jun-15" type='text' id='Datepicker3' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="7-Jun-15" type='text' id='Datepicker4' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="10-Jun-15" type='text' id='Datepicker5' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="8-Jun-15" type='text' id='Datepicker6' /></td>
                <td><button>UPDATE</button></td>
             </tr>
             <tr>
           
                <td><input type="checkbox" name="chk1" class="checkOrderId" value="1"> </td>
                <td style='text-align: center;'>2</td>
                <td>P_SMF_00133_JK </td>
                <td> FORW002</td>
                <td> Consi_111</td>
                <td> Sea</td>
            
                <td><input class='tbl-datepicker Datepicker' placeholder="4-Jun-15" type='text' id='Datepicker7' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="8-Jun-15" type='text' id='Datepicker8' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="10-Jun-15" type='text' id='Datepicker9' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="-" type='text' id='Datepicker10' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="-" type='text' id='Datepicker11' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="-" type='text' id='Datepicker12' /></td>
                <td><button>UPDATE</button> </td>
             </tr>
      
        </tbody>
    </table>
</div>
    
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg hide" data-toggle="modal" id="proforma-popup" data-target="#myModal">
</button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Generate Proforma</h4>
      </div>
      <div class="modal-body">
          
          <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="text" class="control-label">Supplier/Agent Name:</label>
            <input type="text" class="form-control" placeholder="Supplier/Agent Name" id="supplier-agent" name="supplier-agent">
          </div>

          <div class="form-group">
            <label for="name" class="control-label">Date of Proforma:</label>
            <input type="text" class="form-control Datepicker" id="Datepicker20" placeholder="Click to select date"  > 
          </div>
          <div class="form-group">
            <label for="text" class="control-label">Proforma Invoice No.:</label>
            <input type="text" class="form-control" placeholder="Enter Proforma Invoice No. here" id="proforma-invoice">
          </div>
        </form>
      </div>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

<style>
    .table   tbody   tr    td, .table   tfoot > tr  td {
 padding:8px 0px;
  border-top: 1px solid #eaeff0;
}</style>
<!--<footer class="panel-footer">
   
</footer>-->
</div>

@stop 