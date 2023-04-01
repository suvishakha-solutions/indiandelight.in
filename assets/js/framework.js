async function promisingAjaxCall(url, type, data, contentType)
{
	var promise = new Promise((resolve, reject) =>
	{
		$.ajax(
			{
				url: url,
				type: type,
				data: data,
				contentType: contentType,

				success: function (data, status, xhr)
				{
					resolve([ data, status, xhr ]);
				},
				error: function (jqXHR, textStatus, ex)
				{
					reject([ jqXHR, textStatus, ex ]);
				}
			});
	});

	return promise;
}

async function promisingUploadAjaxCall(url, type, data, contentType)
{
	var promise = new Promise((resolve, reject) =>
	{
		$.ajax(
			{
				url: url,
				type: type,
				data: data,
				contentType: contentType,

				success: function (data, status, xhr)
				{
					resolve([ data, status, xhr ]);
				},
				error: function (jqXHR, textStatus, ex)
				{
					reject([ jqXHR, textStatus, ex ]);
				}
			});
	});

	return promise;
}

function createJSON(params, values)
{
	if (params.length !== values.length)
	{
		return "";
	}

	var json = {};

	for (var i = 0; i < params.length; ++i)
	{
		json[ params[ i ] ] = values[ i ];
	}

	return JSON.stringify(json);
}

function joinParameters(parameterNames, parameterValues)
{
	var dataString = "";

	for (var i = 0; i < parameterNames.length; i++)
	{
		dataString += parameterNames[ i ] + "=" + parameterValues[ i ];
		dataString += "&";
	}

	return dataString;
}