<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ URL::to('blog/asset/js/jquery.js')}}"></script>
<script src="{{ URL::to('blog/asset/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{ URL::to('blog/asset/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{ URL::to('blog/asset/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{ URL::to('blog/asset/js/slidebars.min.js')}}"></script>
<script src="{{ URL::to('blog/asset/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{ URL::to('blog/asset/js/respond.min.js')}}" ></script>

<script type="text/javascript" language="javascript"
        src="{{ URL::to('blog/asset/plugin/advanced-datatable/media/js/jquery.dataTables-latest.js')}}"></script>
<script type="text/javascript"
        src="{{ URL::to('blog/asset/plugin/data-tables/DT_bootstrap.js')}}"></script>
<script src="{{ URL::to('blog/asset/js/common_utility_aii.js')}}"></script>
<script src="{{ URL::to('blog/asset/plugin/summernote/dist/summernote.min.js')}}"></script>
<script src="{{ URL::to('blog/asset/js/chosen.jquery.js')}}"></script>
<script src="{{ URL::to('blog/asset/js/chosen.jquery.min.js')}}"></script>

<!--common script for all pages-->
<script src="{{ URL::to('blog/asset/js/common-scripts.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, beforeSend: function() {
            //$('#loader').show();
        },
        complete: function(xhr, stat) {
            //$('#loader').show();
        }
    });

</script>
