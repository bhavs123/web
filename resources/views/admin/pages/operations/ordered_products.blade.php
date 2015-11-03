@extends('admin.layouts.default')
@section('content')

<div class="col-md-12 ">
    <div class="search-box-header">
<div class="row">
                        <div class="col-sm-9" style="border-right:1px solid #ccc;">
                            <form method="get" action=" " id="searchForm">
                                <div class="btn-group pull-left col-md-12">
                                    <div class="form-group col-md-3">

                                        
                                        <input type="hidden" value="orderSearch" name="orderSearch">

                                        <input type="text" value="" name="project-name" aria-controls="editable-sample" class="form-control medium" placeholder="Project Name">

                                    </div>


                                    <div class="form-group col-md-3">
                                        <input type="text" name="client-name" value="" class="form-control  " placeholder="Client Name" autocomplete="off"  >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" name="product-name" value="" class="form-control toDate col-md-3  " placeholder="Product Name"  autocomplete="off" id=" ">
                                    </div>
                                    
                                    <div class="form-group col-md-3"> 
                                        <input type="text" name="brand-name"  value="" class="form-control toDate col-md-3  " placeholder="Brand Name" autocomplete="off" id=" ">
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
   
                                            <option value="1" id="generate-proforma">Generate Proforma</option>
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
                <th><input type="checkbox" name="select-all" class="checkOrderId" value="*"></th>
                <th width="6%">Sr No</th>
                <th>Project</th>
                <th>Product</th>
                <th width="11%">Product Code</th>
                <th width="10%">Brand Name</th>
                <th>Finish Desc</th>
                <th>Dimensions</th>
                <th>Supplier/Agent</th>
                <th>Actions</th>
               
            </tr>
        </thead>
        <tbody>
          
            <tr>
                
                <td><input type="checkbox" name="chk1" class="checkOrderId" value="1"> </td>
                <td>1</td>
                <td>P_SMF_00133_RS </td>
                <td> ARABELLA WITH CUSHION</td>
                <td> CU29SEJ0780</td>
                <td> GIORGETTI</td>
                <td> Chair in maple with fabric or leather upholstery</td>
                <td> CM (121,85,102)</td>
                <td> GIORGETTI</td>
                <td><button>View</button></td>
             </tr>
             <tr>
                
                <td><input type="checkbox" name="chk1" class="checkOrderId" value="1"> </td>
                <td>2</td>
                <td>P_SMF_00133_RS </td>
                <td> CUSHION</td>
                <td> CU29SEJ0780</td>
                <td> GIORGETTI</td>
                <td> Small armchair in maple with fabric or leather upholstery</td>
                <td> CM (55,65,200)</td>
                <td><a href="#" class="add-new-agent">Assign</a></td>
                <td><button>View</button></td>
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
            <input type="text" class="form-control Datepicker " id="Datepicker20" placeholder="Click to select date" name="date-of-proforma"  > 
          </div>
          <div class="form-group">
            <label for="text" class="control-label">Proforma Invoice No.:</label>
            <input type="text" class="form-control" placeholder="Enter Proforma Invoice No. here" id="proforma-invoice" name="proforma-invoice">
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


<!--<footer class="panel-footer">
   
</footer>-->
</div>

@stop 