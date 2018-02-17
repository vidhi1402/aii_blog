<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Category list
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="category_info_table">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="OurTeamUItable">
                        @foreach($aCategory as $oCategory)
                            <tr>
                                <td>{{ $oCategory->name }}</td>
                                <td>{{ $oCategory->slug }}</td>
                                <td>
                                    @if($oCategory->status  == config('constants.ACTIVE'))
                                        <button id="active" class="badge btn-success"
                                                onclick="changeStatus(this,'{{$oCategory->id_category}}');"
                                                value="{{config('constants.ACTIVE')}}">Active
                                        </button>
                                    @else
                                        <button id="deactive" class="badge btn-danger"
                                                onclick="changeStatus(this,'{{$oCategory->id_category}}');"
                                                value="{{config('constants.INACTIVE')}}">Inactive
                                        </button>
                                    @endif
                                </td>
                                <td><a href="{{ route('blog.category.edit',array( 'id' => $oCategory->id_category)) }}"
                                       class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('blog.category.delete',array( 'id' => $oCategory->id_category)) }}"
                                       class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>


{{--
<section class="panel">
    <div class="panel-body">

        <div class="modal fade modal-dialog-center" id="model_bs_agent_info" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content-wrap">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Licensee Details</h4>
                        </div>
                        <div class="panel-body" id="model-bs-agent-info">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
--}}

