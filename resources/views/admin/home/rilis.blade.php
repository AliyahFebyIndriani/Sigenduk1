@if ($rilis['update_available'])
    <div class="row">
        <div class='col-md-12'>
            <div id="modal-catatan-rilis" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Catatan Rilis
                                {{ config_item('nama_aplikasi') }} <small
                                    class="label label-success">{{ $rilis['latest_version'] }}</small></h4>
                        </div>
                        <div class="modal-body rilis">
                            {!! nl2br($rilis['release_body']) !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-social btn-danger btn-sm pull-left"
                                data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
                            <a href="{{ $rilis['url_download'] }}" class="btn btn-social bg-navy btn-sm pull-right">
                                <i class="fa fa-download"></i> Unduh
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
