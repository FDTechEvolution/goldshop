function serializeForm(form_id) {
    var form_data = {};
    jQuery($('#' + form_id)).serializeArray().map(function (item) {
        if (form_data[item.name]) {
            if (typeof (form_data[item.name]) === "string") {
                form_data[item.name] = [form_data[item.name]];
            }
            form_data[item.name].push(item.value);
        } else {
            form_data[item.name] = item.value;
        }
    });
    //console.log(form_data);
    return form_data;
}