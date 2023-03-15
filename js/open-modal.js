function show_modal(car_id) {
    var logged_user = document.getElementById(car_id).value;
    if (logged_user == "customer") {
        document.getElementById('customer_logged_in').style.display = "block";
        document.getElementById('input_car_id').value = car_id;
    } else if (logged_user == "agency") {
        document.getElementById('agency_logged_in').style.display = "block";
    } else if (logged_user == "out") {
        document.getElementById('customer_logged_out').style.display = "block";
    }
}

function car_added_modal() {
        document.getElementById('car_addition_modal').style.display = "block";
}

function edit_car_modal(car_id) {     
        document.getElementById('edit_car').style.display = "block";
}