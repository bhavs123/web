@extends('admin.layouts.default')
@section('content')

<div class="col-md-12 ">
    <div class="search-box-header">
<div class="row">
                        <div class="col-sm-12" style="border-right:1px solid #ccc;">
                            <form method="get" action=" " id="searchForm">
                                <div class="btn-group pull-left col-md-12">
                                    <div class="form-group col-md-3">
          <input type="text" value="" name="supplier-agent" disabled aria-controls="editable-sample" class="form-control medium" placeholder="Supplier/ Agent">
                                    </div>
                                       <div class="form-group col-md-3">
<input type="text" value="" name="proforma-invoice-no" aria-controls="editable-sample" class="form-control medium" placeholder="Proforma Invoice no.">
                                    </div>
 

                                    <div class="form-group col-md-3">
                                         <input type="text" name="proforma-date" value="" class="form-control fromDate Datepicker" placeholder="Proforma Date" autocomplete="off" id="Datepicker3 ">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" name="confirmation-date" value="" class="form-control toDate col-md-3 Datepicker" placeholder="Confirmation Date" autocomplete="off" id="Datepicker4">
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
                <th>Product</th>
                <th>Product Code</th>
                <th>Qty</th>
                <th>Completion Date</th>
    
               
            </tr>
        </thead>
        <tbody>
          
            <tr>
                <td>ARABELLA WITH CUSHION</td>
                <td>CU29SEJ0780</td>
                <td>3</td>
             <td><input type="text" class="form-control w40 Datepicker" id="Datepicker1" value="1-Jun-15" placeholder="Click to select date"  > </td>  
 
            </tr>
            <tr>
                <td>CUSHION</td>
                <td>CU29SEJ0780</td>
                <td>2</td>
                <td><input type="text" class="form-control w40 Datepicker" id="Datepicker2" value="5-Jun-15" placeholder="Click to select date"  > </td>  
     
            </tr>
           
        </tbody>
    </table>
</div>
 
</div>

@stop 