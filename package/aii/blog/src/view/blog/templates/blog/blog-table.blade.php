<table class="display table table-bordered table-striped" id="blog_info_table">
    <thead>
    <tr>
        <th>{{config('constants.BLOG')}} Title</th>
        <th>Slug</th>
        <th>Date</th>
        <th>Post By</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody id="OurTeamUItable">
    @foreach($aBlog as $oBlog)
        <tr>
            <td>{{ $oBlog->title }}</td>
            <td>{{ $oBlog->slug }}</td>
            <td>{{ $oBlog->date }}</td>
            <td>{{ $oBlog->post_by }}</td>
            <td>
                @if($oBlog->status  == config('constants.ACTIVE'))
                    <button id="active" class="badge btn-success" onclick="changeStatus(this,'{{$oBlog->id_blog}}');"
                            value="{{config('constants.ACTIVE')}}">Active
                    </button>
                @else
                    <button id="deactive" class="badge btn-danger" onclick="changeStatus(this,'{{$oBlog->id_blog}}');"
                            value="{{config('constants.INACTIVE')}}">Inactive
                    </button>
                @endif
            </td>
            <td>
                <button class="btn btn-warning btn-xs"
                        onclick="viewBlog({{$oBlog->id_blog}})"><i class="fa fa-file-text"></i>
                </button>

                <a href="{{ route('blog.blog.edit',array( 'id' => $oBlog->id_blog)) }}"
                   class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="{{ route('blog.blog.delete',array( 'id' => $oBlog->id_blog)) }}" class="btn btn-danger btn-xs">
                    <i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{--aii modal--}}

<section class="panel">
    <div class="panel-body">
        <div class="modal fade modal-dialog-center" id="modal_blog" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content-wrap">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">{{config('constants.BLOG')}} Description</h4>
                        </div>
                        <div class="panel-body" id="blog_Detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>