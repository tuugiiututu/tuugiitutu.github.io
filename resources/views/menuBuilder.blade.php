@extends('myadmin')
@section('containers')
<div class=" container">
    <div class=" row ">
        <div class=" p-2 col-lg-5 card">
            <div class="p-2">
                <div class="row p-2">
                    <h6>Menu</h6>
                    <div class="ml-auto">
                        <button data-toggle="modal" data-target="#sizedModalSm" class="btn btn-sm btn-success"
                            title="Add Menu"><i class="fa fa-plus-circle"></i></button>
                        <div class="modal fade" id="sizedModalSm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    @csrf
                                    <div class="card card-container p-3 ">
                                        <br />
                                        <div class="form-signin">
                                            <h5 style="text-align: center;margin-top: 15px;">Шинээр нэмэх
                                                <strong>Menu</strong>-ны мэдээллийг оруулна уу.</h5><br />

                                            <label for="mName">Name:</label>
                                            <input type="text" class="form-control  required" id="mName" name="mName"
                                                placeholder="Нэр өгнө үү">
                                            <label for="mUrl">Url:</label>
                                            <input type="text" class="form-control required" id="mUrl" name="mUrl"
                                                placeholder="Url бичнэ үү">
                                            <label for="mParent">Parent байгаа эсэх:</label>
                                            <select class="form-control required" name="mParent" id="mParent">
                                                <option value disabled selected>...</option>
                                                <option value="1">Тийм</option>
                                                <option value="0">Үгүй</option>
                                            </select>
                                        </div>
                                        <div class="row p-3">
                                            <div class="mr-auto">
                                                <button class="btn btn-primary" data-dismiss="modal">Буцах</button>

                                            </div>
                                            <div class="ml-auto">
                                                <button id='savebtn'
                                                    class="btn btn-success btn-block btn-signin ">Бүртгэх</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th class=" p-0">
                                Name
                            </th>
                            <th class=" p-0">
                                Url
                            </th>
                            <th class=" p-0">
                                Parent
                            </th>
                            <th class=" p-0">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($navs))
                        @foreach ($navs as $item)
                        <tr>
                            <td class=" p-0">
                                {{$item->name}}
                            </td>
                            <td class=" p-0">
                                {{$item->url}}
                            </td>
                            <td class=" p-0">
                                {{$item->parent_id}}
                            </td>
                            <td class=" p-0">
                                <button data-id="{{ $item->id }}" class="btn btn-sm btn-danger deleteMenuBtn"
                                    title="Delete Menu"><i class="fa fa-trash"></i></button>
                                <button data-toggle="modal" data-target="#MyEditModal{{ $item->id }}"
                                    class="btn btn-sm btn-success" title="Edit Menu"><i
                                        class="fa fa-pencil-square-o"></i></button>
                                <div class="modal fade" id="MyEditModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            @csrf
                                            <div class="card card-container p-3 ">
                                                <br />
                                                <div class="form-signin">
                                                    <h5 style="text-align: center;margin-top: 15px;">Засварлах
                                                        <strong>Menu</strong>-ны мэдээллийг оруулна уу.</h5><br />

                                                    <label for="emName{{ $item->id }}">Name:</label>
                                                    <input type="text" class="form-control  required" id="emName{{ $item->id }}"
                                                        name="emName{{ $item->id }}" value="{{$item->name}}" placeholder="Нэр өгнө үү">
                                                    <label for="emUrl{{ $item->id }}">Url:</label>
                                                    <input type="text" class="form-control required" id="emUrl{{ $item->id }}"
                                                        name="emUrl{{ $item->id }}" value="{{$item->url}}" placeholder="Url бичнэ үү">
                                                    <label for="emParent{{ $item->id }}">Parent байгаа эсэх:</label>
                                                    <select class="form-control required" name="emParent{{ $item->id }}" id="emParent{{ $item->id }}">
                                                        <option @if($item->parent_id==1) selected @endif value="1">Тийм
                                                        </option>
                                                        <option @if($item->parent_id==0) selected @endif value="0">Үгүй
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="row p-3">
                                                    <div class="mr-auto">
                                                        <button class="btn btn-primary"
                                                            data-dismiss="modal">Буцах</button>

                                                    </div>
                                                    <div class="ml-auto">
                                                        <button data-id="{{ $item->id }}"
                                                            class="btn btn-success btn-block btn-signin editMenuBtn ">Засварлах</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="3" class=" p-0 text-center">Not found.</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>


        </div>
        <div class="m-auto p-2 col-lg-6 card">
            <div class=" p-2">
                <div class="row p-2">
                    <h6>Parent Menu</h6>
                    <div class="ml-auto">
                        <button data-toggle="modal" data-target="#MyParentMenuModel" class="btn btn-sm btn-success "
                            title="Add ParentMenu"><i class="fa fa-plus-circle"></i></button>
                        <div class="modal fade" id="MyParentMenuModel" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    @csrf
                                    <div class="card card-container p-3 ">
                                        <br />
                                        <div class="form-signin">
                                            <h5 style="text-align: center;margin-top: 15px;">Шинээр нэмэх
                                                <strong>Parent Menu</strong>-ны мэдээллийг оруулна уу.</h5><br />

                                            <label for="pmName">Name:</label>
                                            <input type="text" class="form-control  required" id="pmName" name="pmName"
                                                placeholder="Нэр өгнө үү">
                                            <label for="pmUrl">Url:</label>
                                            <input type="text" class="form-control required" id="pmUrl" name="pmUrl"
                                                placeholder="Url бичнэ үү">
                                            <label for="pmMenu">Menu id:</label>
                                            <select class="form-control required" name="pmMenu" id="pmMenu">
                                                <option value disabled selected>...</option>
                                                @foreach ($navs as $n )
                                                <option value="{{$n->id}}">{{$n->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="pmSubMenu">SubMenu байгаа эсэх:</label>
                                            <select class="form-control required" name="pmSubMenu" id="pmSubMenu">
                                                <option value disabled selected>...</option>
                                                <option value="1">Тийм</option>
                                                <option value="0">Үгүй</option>
                                            </select>
                                        </div>
                                        <div class="row p-3">
                                            <div class="mr-auto">
                                                <button class="btn btn-primary" data-dismiss="modal">Буцах</button>

                                            </div>
                                            <div class="ml-auto">
                                                <button id='savePMbtn'
                                                    class="btn btn-success btn-block btn-signin ">Бүртгэх</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th class=" p-0">
                                Name
                            </th>
                            <th class=" p-0">
                                Url
                            </th>
                            <th class=" p-0">
                                Menu Id
                            </th>
                            <th class=" p-0">
                                Sub Menu
                            </th>
                            <th class=" p-0">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($parents))
                        @foreach ($parents as $item )
                        <tr>
                            <td class=" p-0">
                                {{$item->name}}
                            </td>
                            <td class=" p-0">
                                {{$item->url}}
                            </td>
                            <td class=" pl-2 p-0">
                                {{$item->nav_bar_id}}
                            </td>
                            <td class=" p-0">
                                {{$item->sub_parent_id}}
                            </td>
                            <td class=" row p-0">
                                <button data-id="{{ $item->id }}" class="btn btn-sm btn-danger deleteParentBtn"
                                    title="Delete Menu"><i class="fa fa-trash"></i></button>
                                <button  data-toggle="modal" data-target="#MyEditParentModal{{ $item->id }}" class="btn btn-sm btn-success" title="Edit Menu"><i
                                        class="fa fa-pencil-square-o"></i></button>
                                        <div class="modal fade" id="MyEditParentModal{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    @csrf
                                                    <div class="card card-container p-3 ">
                                                        <br />
                                                        <div class="form-signin">
                                                            <h5 style="text-align: center;margin-top: 15px;">Засварлах
                                                                <strong>Parent Menu</strong>-ны мэдээллийг оруулна уу.</h5><br />

                                                            <label for="pmName{{ $item->id }}">Name:</label>
                                                            <input type="text" class="form-control  required" id="pmName{{ $item->id }}"
                                                                name="pmName{{ $item->id }}" value="{{$item->name}}" placeholder="Нэр өгнө үү">
                                                            <label for="pmUrl{{ $item->id }}">Url:</label>
                                                            <input type="text" class="form-control required" id="pmUrl{{ $item->id }}"
                                                                name="pmUrl{{ $item->id }}" value="{{$item->url}}" placeholder="Url бичнэ үү">
                                                                <label for="pmMenu{{ $item->id }}">Menu:</label>
                                                            <select class="form-control required" name="pmMenu{{ $item->id }}" id="pmMenu{{ $item->id }}">
                                                                @foreach ($navs as $n )
                                                                <option @if($item->nav_bar_id==$n->id) selected @endif value="{{$n->id}}">{{$n->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="pmSubMenu{{ $item->id }}">SubMenu байгаа эсэх:</label>
                                                            <select class="form-control required" name="pmSubMenu{{ $item->id }}" id="pmSubMenu{{ $item->id }}">
                                                                <option value disabled selected>...</option>
                                                                <option @if($item->sub_parent_id==1) selected @endif value="1">Тийм</option>
                                                                <option @if($item->sub_parent_id==0) selected @endif value="0">Үгүй</option>
                                                            </select>
                                                        </div>
                                                        <div class="row p-3">
                                                            <div class="mr-auto">
                                                                <button class="btn btn-primary"
                                                                    data-dismiss="modal">Буцах</button>

                                                            </div>
                                                            <div class="ml-auto">
                                                                <button data-id="{{ $item->id }}"
                                                                    class="btn btn-success btn-block btn-signin editMenuParentBtn ">Засварлах</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="3" class="p-0 text-center">Not found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        <div class="mt-3 p-2 col-lg-5 card">
            <div class=" p-2">
                <div class="row p-2">
                    <h6>Sub Menu</h6>
                    <div class="ml-auto">
                        <button data-toggle="modal" data-target="#MySubMenuModel" class="btn btn-sm btn-success "
                            title="Add SubMenu"><i class="fa fa-plus-circle"></i></button>
                        <div class="modal fade" id="MySubMenuModel" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    @csrf
                                    <div class="card card-container p-3 ">
                                        <br />
                                        <div class="form-signin">
                                            <h5 style="text-align: center;margin-top: 15px;">Шинээр нэмэх
                                                <strong>Sub Menu</strong>-ны мэдээллийг оруулна уу.</h5><br />

                                            <label for="smName">Name:</label>
                                            <input type="text" class="form-control  required" id="smName" name="smName"
                                                placeholder="Нэр өгнө үү">
                                            <label for="smUrl">Url:</label>
                                            <input type="text" class="form-control required" id="smUrl" name="smUrl"
                                                placeholder="Url бичнэ үү">
                                            <label for="smMenu">Parent Menu id:</label>
                                            <select class="form-control required" name="smMenu" id="smMenu">
                                                <option value disabled selected>...</option>
                                                @foreach ($parents as $n )
                                                <option value="{{$n->id}}">{{$n->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row p-3">
                                            <div class="mr-auto">
                                                <button class="btn btn-primary" data-dismiss="modal">Буцах</button>

                                            </div>
                                            <div class="ml-auto">
                                                <button id='saveSMbtn'
                                                    class="btn btn-success btn-block btn-signin ">Бүртгэх</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class=" table table-hover">
                    <thead>
                        <tr>
                            <th class=" p-0">
                                Name
                            </th>
                            <th class=" p-0">
                                Url
                            </th>
                            <th class=" p-0">
                                Parent Id
                            </th>
                            <th class=" p-0">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($subParents))
                        @foreach ($subParents as $item)
                        <tr>
                            <td class=" p-0">
                                {{$item->sub_name}}
                            </td>
                            <td class=" p-0">
                                {{$item->sub_url}}
                            </td>
                            <td class="pl-2 p-0">
                                {{$item->parent_id}}
                            </td>
                            <td class=" p-0">
                                <button data-id="{{ $item->id }}" class="btn btn-sm btn-danger deleteSubBtn"
                                    title="Delete Menu"><i class="fa fa-trash"></i></button>
                                <button data-toggle="modal" data-target="#MyEditSubMenu{{ $item->id }}"class="btn btn-sm btn-success" title="Edit Menu"><i
                                        class="fa fa-pencil-square-o"></i></button>
                                        <div class="modal fade" id="MyEditSubMenu{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    @csrf
                                                    <div class="card card-container p-3 ">
                                                        <br />
                                                        <div class="form-signin">
                                                            <h5 style="text-align: center;margin-top: 15px;">Засварлах
                                                                <strong>Sub Menu</strong>-ны мэдээллийг оруулна уу.</h5><br />
                                                            <label for="eSmName{{ $item->id }}">Name:</label>
                                                            <input type="text" class="form-control  required" id="eSmName{{ $item->id }}" value="{{$item->sub_name}}" name="eSmName{{ $item->id }}"
                                                                placeholder="Нэр өгнө үү">
                                                            <label for="eSmUrl{{ $item->id }}">Url:</label>
                                                            <input type="text" class="form-control required" id="eSmUrl{{ $item->id }}" value="{{$item->sub_url}}" name="eSmUrl{{ $item->id }}"
                                                                placeholder="Url бичнэ үү">
                                                            <label for="eSmMenu{{ $item->id }}">Parent Menu id:</label>
                                                            <select class="form-control required" name="eSmMenu{{ $item->id }}" id="eSmMenu{{ $item->id }}">
                                                                @foreach ($parents as $n )
                                                                <option @if($item->parent_id==$n->id) selected @endif value="{{$n->id}}">{{$n->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="row p-3">
                                                            <div class="mr-auto">
                                                                <button class="btn btn-primary" data-dismiss="modal">Буцах</button>

                                                            </div>
                                                            <div class="ml-auto">
                                                                <button data-id="{{ $item->id }}"
                                                                    class="btn btn-success btn-block btn-signin editSMBtn">Засварлах</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="3" class=" p-0 text-center">Not found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>


        </div>
    </div>

</div>
@endsection

@section('js')
<script>
    $("#savebtn").on("click", function(){
        var mNameData =  $("#mName").val();
        var mUrlData = $("#mUrl").val();
        var mParentData = $("#mParent").val();
        var param={mName: mNameData, mUrl: mUrlData, mParent:mParentData, "_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?menu=1', param, function(){
            alert("Хадгалагдлаа");
            location.reload();
        })
    })
    $("#savePMbtn").on("click", function(){
        var pmNameData =  $("#pmName").val();
        var pmUrlData = $("#pmUrl").val();
        var pmMenuData = $("#pmMenu").val();
        var pmSubMenuData = $("#pmSubMenu").val();
        var param={pmName: pmNameData, pmUrl: pmUrlData, pmMenu:pmMenuData, pmSubMenu:pmSubMenuData,"_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?parent=1', param, function(){
            alert("Хадгалагдлаа");
            location.reload();
        })
    })
     $("#saveSMbtn").on("click", function(){
        var smNameData =  $("#smName").val();
        var smUrlData = $("#smUrl").val();
        var smMenuData = $("#smMenu").val();
        var param={smName: smNameData, smUrl: smUrlData, smMenu:smMenuData,"_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?sub=1', param, function(){
            alert("Хадгалагдлаа");
            location.reload();
        })
    })

    $(".deleteMenuBtn").on("click", function(){
        var menuId = $(this).data('id');
        var param={id: menuId,"_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?deleteMenu=1', param, function(){
            alert("Устгагдлаа.");
            location.reload();
        })
    })
    $(".deleteParentBtn").on("click", function(){
        var menuId = $(this).data('id');
        var param={id: menuId,"_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?deleteParent=1', param, function(){
            alert("Устгагдлаа.");
            location.reload();
        })
    })
    $(".deleteSubBtn").on("click", function(){
        var menuId = $(this).data('id');
        var param={id: menuId,"_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?deleteSub=1', param, function(){
            alert("Устгагдлаа.");
            location.reload();
        })
    })
    $(".editMenuBtn").on("click", function(){
        var menuId = $(this).data('id');
        var mNameData =  $("#emName"+menuId).val();
        var mUrlData = $("#emUrl"+menuId).val();
        var mParentData = $("#emParent"+menuId).val();
        var param={id: menuId,emName: mNameData, emUrl: mUrlData, emParent:mParentData,"_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?editMenu=1', param, function(){
            alert("Засварлагдлаа.");
            location.reload();
        })
    })
    $(".editMenuParentBtn").on("click", function(){
        var menuId = $(this).data('id');
        var pmNameData =  $("#pmName"+menuId).val();
        var pmUrlData = $("#pmUrl"+menuId).val();
        var pmMenuData = $("#pmMenu"+menuId).val();
        var pmSubMenuData = $("#pmSubMenu"+menuId).val();
        var param={id: menuId,pmName: pmNameData, pmUrl: pmUrlData, pmMenu:pmMenuData,pmSubMenu:pmSubMenuData,"_token": "{{ csrf_token() }}"};
        $.post('/admin/makeMenu/save?editParent=1', param, function(){
            alert("Засварлагдлаа.");
            location.reload();
        })
    })
    $(".editSMBtn").on("click", function(){
        var menuId = $(this).data('id');
        var eSmNameData =  $("#eSmName"+menuId).val();
        var eSmUrlData = $("#eSmUrl"+menuId).val();
        var eSmMenuData = $("#eSmMenu"+menuId).val();
        var param={id: menuId,smName: eSmNameData, smUrl: eSmUrlData, smMenu:eSmMenuData,"_token": "{{ csrf_token() }}"};
        console.log(param);
        $.post('/admin/makeMenu/save?editSubMenu=1', param, function(){
            alert("Засварлагдлаа.");
            location.reload();
        })
    })


</script>
@endsection
