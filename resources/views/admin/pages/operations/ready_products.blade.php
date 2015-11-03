@extends('admin.layouts.default')
@section('content')

<div class="col-md-12 ">
    <div class="search-box-header">
<div class="row">
                        <div class="col-sm-9" style="border-right:1px solid #ccc;">
                            <form method="get" action=" " id="searchForm">
                                <div class="btn-group pull-left col-md-12">
                                    <div class="form-group col-md-3">
 
                                        <input type="text" value="" name="project-name" aria-controls="editable-sample" class="form-control medium" placeholder="Project Name">

                                    </div>


                                    <div class="form-group col-md-3">
                                        <input type="text" name="client-name" value="" class="form-control  " placeholder="Client Name" autocomplete="off"  >
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <input type="text" name="supplier-name" value="" class="form-control toDate col-md-3  " placeholder="Proforma Invoice no."  autocomplete="off" id=" ">
                                    </div> 
                                    
                                    <div class="form-group col-md-3">
                                        <input type="text" name=" name" value="" class="form-control toDate col-md-3  " placeholder="Product Name"  autocomplete="off" id=" ">
                                    </div>
                                    
                                    <div class="form-group col-md-3">
                                        <input type="text" name="product-name" value="" class="form-control toDate col-md-3  " placeholder="Product Name"  autocomplete="off" id=" ">
                                    </div>
                                    
                                    <div class="form-group col-md-3"> 
                                        <input type="text" name="brand-name"  value="" class="form-control toDate col-md-3  " placeholder="Brand Name" autocomplete="off" id=" ">
                                    </div>

                                    <div class="form-group col-md-3">
                                    <select name="orderAction"   class="form-control">
                                            <option value="">Select Action</option>
                                                <option value="1" >Production</option>
                                                 <option value="2" >Ready</option>
                                                 <option value="3" >Picked Up</option>
                                         </select>
                                      </div> 
                                    
                                    <div class="form-group col-md-3">
                                        <input type="text" name="co-ordinator" value="" class="form-control col-md-3" placeholder="Co-Ordinator" autocomplete="off" id=" ">
                                    </div>
 
 
                                     <div class="form-group col-md-3">
                                        <input type="submit" name="submit" class="btn sbtn btn-block" value="Search">
                                    </div>


                                </div>
                            </form>

                        </div>
  <div class="col-sm-3 ">
                            <div class="row">

                            <div class="space15 col-md-12">
                                <div class="btn-group pull-right col-md-12 ">
                                    <form action="" method="post" target="_blank">
                                        
                                        <select name="orderAction" id="orderAction" class="form-control">
                                            <option value="">Select Action</option>
   
                                            <option value="1" id="generate-proforma">Create Consignment</option>
                                         </select>
                                    </form> 
                                </div>

                            </div>
 
                             </div>



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
                <th   width= "11%">Product</th>
                <th   width="10%" >Product Code</th>
                <th  >Dimensions</th>
                <th>Supplier/Agent</th>
                <th>Status</th>
                <th> Potential Completion Dt</th>
                <th>Ready Dt</th>
                <th>Pickup Req Dt</th>
                <th>Picked Up Dt</th>
                <th>Actions</th>
               
            </tr>
        </thead>
        <tbody>
          
            <tr>
           
                <td><input type="checkbox" name="chk1" class="checkOrderId" value="1"> </td>
                <td style='text-align: center;'>1</td>
                <td>P_SMF_00133_RS </td>
                <td> ARABELLA WITH CUSHION</td>
                <td> CU29SEJ0780</td>
                <td> CM (121,85,102)</td>
                <td> GIORGETTI</td>
                <td> Production</td> 
                <td><input class='tbl-datepicker Datepicker' placeholder="1-Jun-15" type='text' id='Datepicker1' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="6-Jun-15" type='text' id='Datepicker2' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="7-Jun-15" type='text' id='Datepicker3' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="8-Jun-15" type='text' id='Datepicker4' /></td>
                <td><button>UPDATE</button></td>
             </tr>
             <tr>
           
                <td><input type="checkbox" name="chk1" class="checkOrderId" value="1"> </td>
                <td style='text-align: center;'>2</td>
                <td>P_SMF_00133_RS </td>
                <td> CUSHION</td>
                <td> CU29SEJ0780</td>
                <td> CM (55,65,200)</td>
                <td> GIORGETTI</td>
                <td> Ready</td>
                  <td><input class='tbl-datepicker Datepicker' placeholder="1-Jun-15" type='text' id='Datepicker5' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="6-Jun-15" type='text' id='Datepicker6' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="7-Jun-15" type='text' id='Datepicker7' /></td>
                <td><input class='tbl-datepicker Datepicker' placeholder="8-Jun-15" type='text' id='Datepicker8' /></td>
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
        <h4 class="modal-title" id="myModalLabel">Create Consignment</h4>
      </div>
      <div class="modal-body">
          
         
        <form>
            <div class="col-md-6">
          <div class="form-group ">
            <label for="text" class="control-label">Forwarder:</label>
            <input type="text" class="form-control" placeholder="Supplier/Agent Name" id="Forwarder" name="forwarder">
          </div></div>

          <div class="col-md-6">
          <div class="form-group">
            <label for="name" class="control-label">Consignment No:</label>
            <input type="text" class="form-control" id=" " name="consignment-no" placeholder="Consignment No"> 
          </div></div>
          
           <div class="col-md-6">
          <div class="form-group">
            <label for="name" class="control-label ">Mode:</label><br>
            <select name="mode" class="form-control">
            <option selected="selected">Select Mode</option>
            <option value="Air">Air</option>
            <option value="Sea">Sea</option>
            <option value="Road">Road</option>
            </select>
          </div></div>
              <div class="col-md-6">
          <div class="form-group">
            <label for="name" class="control-label">Remark:</label>
            <input type="text" class="form-control" id=" " name="remark" placeholder="Remark"> 
          </div></div>

<div class="col-md-6">
  <div class="form-group">
            <label for="name" class="control-label">Shipment Date (ETD):</label>
            <input type="text" class="form-control Datepicker " id="Datepicker20" placeholder="Click to select date" name="shipment-date"  > 
          </div></div>
<div class="col-md-6">
  <div class="form-group">
            <label for="name" class="control-label">ETA (Destination Date):</label>
            <input type="text" class="form-control Datepicker " id="Datepicker21" placeholder="Click to select date" name="destination-date"  > 
          </div></div>
<div class="col-md-6">
  <div class="form-group">
            <label for="name" class="control-label">ETA (Destination Date):</label>
            <input type="text" class="form-control Datepicker " id="Datepicker22" placeholder="Click to select date" name="actual-arrival-date"  > 
          </div></div>
          <div class="col-md-6">
  <div class="form-group">
            <label for="name" class="control-label">Clearing Date:</label>
            <input type="text" class="form-control Datepicker " id="Datepicker23" placeholder="Click to select date" name="clearing-date"  > 
          </div></div>
 <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">Warehouse Date:</label>
            <input type="text" class="form-control Datepicker " id="Datepicker24" placeholder="Click to select date" name="warehouse-date"  > 
          </div></div>
           <div class="col-md-6">
          <div class="form-group">
            <label for="name" class="control-label">Delivery Date:</label>
            <input type="text" class="form-control Datepicker " id="Datepicker25" placeholder="Click to select date" name="delivery-date"  > 
          </div></div>

        </form>
      


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
}
.modal-body {
 
  overflow: hidden;
}</style>
<!--<footer class="panel-footer">
   
</footer>-->
</div>

@stop 