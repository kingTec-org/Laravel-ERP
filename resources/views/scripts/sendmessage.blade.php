<script type="text/javascript">
	$(document).on('click','#sms-selected',function() {
		var contacts = [];
		$('.checkbox:checked').each(function() {
			code = $('#code').val()
			contacts.push(code+$(this).closest('tr').children(':eq(5)').text().substring(1));
		});
		if(contacts.length <=0 ) {
			swal('Select atleast one applicant to a send message','','warning');
		}else{
			var joinSelected = contacts.join(',')
			$('#messageModal').modal();
			$('#recipients').val(joinSelected);
		}
		$('#code').on('change',function() {
			$('#recipients').val(this.value).focus();
		})
	})
</script>