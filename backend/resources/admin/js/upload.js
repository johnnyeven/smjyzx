function contentFileUpload(url, uploadId, contentId, valueId, mode, maxCount) {
	$.ajaxFileUpload
	(
		{
			url:url + '?el=' + uploadId,
			secureuri:false,
			fileElementId:uploadId,
			dataType: 'json',
			data:{},
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined')
				{
					if(data.error != 'null')
					{
						alert(data.error);
					}
					else
					{
						alert(data.msg);
						if(mode == "append")
						{
							var url = $("#" + valueId).val().split(";");
							if(url.length < maxCount)
							{
								$("#" + valueId).val(data.data + ";" + $("#" + valueId).val());
							}
							else
							{
								url.pop();
								url.push(data.data);
								$("#" + valueId).val(url.join(";"));
							}
							$("#" + contentId).prepend("<p>" + data.data + "</p>");
						}
						else
						{
							$("#" + contentId).empty();
							$("#" + contentId).append("<p>" + data.data + "</p>");
							$("#" + valueId).val(data.data);
						}
					}
				}
			},
			error: function (data, status, e) {
				alert(e);
			}
		}
	)
	return false;
}

function contentPicUpload(url, uploadId, contentId, valueId, mode, maxCount) {
	$.ajaxFileUpload
	(
		{
			url:url + '?el=' + uploadId,
			secureuri:false,
			fileElementId:uploadId,
			dataType: 'json',
			data:{},
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined')
				{
					if(data.error != 'null')
					{
						alert(data.error);
					}
					else
					{
						alert(data.msg);
						if(mode == "append")
						{
							var url = $("#" + valueId).val().split(";");
							if(url.length < maxCount)
							{
								$("#" + valueId).val(data.data + ";" + $("#" + valueId).val());
							}
							else
							{
								url.pop();
								url.push(data.data);
								$("#" + valueId).val(url.join(";"));
							}
							$("#" + contentId).prepend("<div style='padding:10px;border:#CCC 1px solid;width:200px;height:200px;float:left;margin-right:10px;'><img src='" + data.data + "' /><a href='#'>删除</a></div>");
						}
						else
						{
							$("#" + contentId).empty();
							$("#" + contentId).append("<div style='padding:10px;border:#CCC 1px solid;width:200px;height:200px;float:left;margin-right:10px;'><img src='" + data.data + "' /><a href='#'>删除</a></div>");
							$("#" + valueId).val(data.data);
						}
						$("#" + contentId + " img").resizeImg({w: 200, h: 200});
					}
				}
			},
			error: function (data, status, e) {
				alert(e);
			}
		}
	)
	return false;
}