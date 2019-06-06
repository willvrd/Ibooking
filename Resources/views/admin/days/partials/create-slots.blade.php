<div class="form-group">
    <label for="slots">{{trans('ibooking::slots.plural')}}</label>
        
</div>

<div class="form-group">
    <label for="related_ids">hour</label>
    <input type="time" name="hour" id="hour">
</div>

{{--
<div class="form-group">
    <label for="related_ids" style="width:100%;">prueba</label>
    <select id="related_ids" name="related_ids[]" class="form-control" multiple style="width:100%;">
            
    </select>
</div>

<link href="{{asset('modules/bcrud/vendor/select2/select2.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('modules/bcrud/vendor/select2/select2-bootstrap-dick.css') }}" rel="stylesheet" type="text/css" />
--}}

{{--
@push('js-stack')

<script src="{{ asset('modules/bcrud/vendor/select2/select2.js') }}"></script>


<script>
    jQuery(document).ready(function($) {
        console.log("inicia");

        $("#related_ids").each(function (i, obj) {
            if (!$(obj).hasClass("select2-hidden-accessible")){
	            
                $(obj).select2({
	                theme: 'bootstrap',
	                multiple: true,
	                placeholder: "{{trans('ibooking::slots.plural')}}",
	                minimumInputLength: "2",
	                language:"{{locale()}}",
	                ajax: {
		                url: "http://127.0.0.1:8000/api/ibooking/v1/slots/1",
		                dataType: 'json',
		                quietMillis: 250,
		                data: function (params) {
		                    return {
                                q: params.term, // search term
                                page: params.page
                            };
		                },
		                processResults: function (data, params) {
							
                            params.page = params.page || 1;
								   
							return {
		                        results: $.map(data.data, function (item) { 
                                    console.log(item);
		                            return {
		                                text: item["hour"],
		                                id: item["id"]
		                            }
		                        }),
		                        more: data.current_page < data.last_page
		                    };
		                },
		                cache: true
	                },

	            });
	        }
        });
    });
</script>


@endpush
--}}


