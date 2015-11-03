@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Products</h1>
</div>
<div class="wrapper-md">
    <div class="tab-container">
        {!! view('admin.includes.productHeader',['id' => $prod->id, 'prod_type' => $prod->prod_type]) !!}
        <div class="tab-content">

            <div class="panel-body">
                {!! Form::model($prod, ['method' => 'post', 'files'=> true, 'url' => $action ,'id'=>'ComboProdID' ,'class' => 'form-horizontal' ]) !!}
                {!! Form::hidden("id",$prod->id) !!}
                <?php
                $combo_prods = $prod->comboproducts->toArray();
                ?>
                <div class="table-responsive">
                    <table class="table comboProds table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Product</th>
                                <th>Short Description</th>
                                <th>Product Type</th>
                                <th>Categories</th>

                                <th>Availability</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prods as $prd)

                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label class="i-checks i-checks-sm">
                                            <input type="checkbox" name="combo_prods[]" value="{!! $prd->id !!}" {!! App\Library\Helper::searchForKey("id",$prd->id,$combo_prods) ? "checked" : "" !!} />
                                                   <i></i>
                                        </label></div>
                                </td>
                                <td>{!! $prd->product !!}</td>
                                <td>{!! $prd->short_desc !!}</td>
                                <td>
                                    <?php $prod_type = $prd->producttype->toArray(); ?>
                                    {!! $prod_type['type'] !!}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($prd->categories as $cat)
                                        <li>
                                            <a href="{!! route('admin.category.edit',['id'=>$cat->id]) !!}" class="edit"> {!! $cat->category  !!}</a>

                                        </li>
                                        @endforeach  

                                    </ul>                                
                                </td>

                                <td>{!! $prd->is_avail == 0 ? "Out of Stock" : "In Stock" !!}</td>
                                <td>{!! $prd->stock !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


                {!! Form::hidden('return_url',null,['class'=>'rtUrl']) !!}




                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-4 text-right text-center-xs pull-right">                
                            <?= $prods->render() ?>           
                        </div>
                    </div>
                </footer>

            <div class="form-group col-sm-12 ">
                {!! Form::button('Save & Exit',["class" => "btn btn-primary pull-right saveComboExit"]) !!}
                {!! Form::button('Save & Continue',["class" => "btn btn-primary pull-right saveComboContine"]) !!}
                {!! Form::submit('Save & Next',["class" => "btn btn-primary pull-right"]) !!}
            </div>

            </div>



            {!! Form::close() !!}   



        </div>
    </div>
</div>

@stop 

@section('myscripts')

<script>
    $(document).ready(function() {

        $(".saveComboExit").click(function() {
            $(".rtUrl").val("{!! route('admin.products.view')!!}");
            $("#ComboProdID").submit();

        });

        $(".saveComboContine").click(function() {
            $(".rtUrl").val("{!! route('admin.products.updateComboProds',['id'=>$prod->id])!!}");
            $("#ComboProdID").submit();

        });


        $(".comboProds input[type='checkbox']").click(function() {

            if ($(this).prop("checked")) {
                sync("{{ $prod->id }}", $(this).val(), "{{ URL::route('comboAttach') }}");
            } else {
                sync("{{ $prod->id }}", $(this).val(), "{{ URL::route('comboDetach') }}");
            }
        });
    });
    function sync(id, prod_id, action) {
        $("input[type='submit']").prop("diabled", true);
        $.ajax({
            url: action,
            type: "POST",
            data: {id: id, prod_id: prod_id},
            sucess: function(data) {
                console.log(data);
                $("input[type='submit']").prop("diabled", false);
            }
        });
    }


</script>
@stop