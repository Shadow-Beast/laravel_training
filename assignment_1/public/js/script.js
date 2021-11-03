//Beer-List
$.ajax({
    url: "/api/beer-list",
    type: "GET",
    dataType: "json",
    success: function (data) {
        data.forEach((beer) => {
            var created_at = moment(
                beer.created_at,
                "YYYY-MM-DD HH:mm:ss"
            ).format("YYYY-MM-DD HH:mm:ss");
            var updated_at = moment(
                beer.updated_at,
                "YYYY-MM-DD HH:mm:ss"
            ).format("YYYY-MM-DD HH:mm:ss");
            $("#api-beerTable > tbody").append(
                `<tr>
                    <td>${beer.id}</td>
                    <td>${beer.brewery_id}</td>
                    <td>${beer.abv}</td>
                    <td>${beer.ibu}</td>
                    <td>${beer.name}</td>
                    <td>${beer.style}</td>
                    <td>${beer.ounces}</td>
                    <td>${created_at}</td>
                    <td>${updated_at}</td>
                    <td width="13%">
                        <a href="/api_view/view-beer/${beer.id}" class="btn btn-dark mr-1" title="View" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                        <a href="/api_view/update-beer/${beer.id}" class="btn btn-info mr-1" title="Update" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>
                        <button class="btn btn-danger" title="Delete" data-toggle="tooltip" onclick="deleteBeer(${beer.id},'${beer.name}')">
                            <span class="fa fa-trash"></span>
                        </button>
                    </td>
                </tr>`
            );
        });
    },
});

//Create-Beer Form
$.ajax({
    url: "/api/create-beer",
    type: "GET",
    dataType: "json",
    success: function (data) {
        data.forEach((brewery) => {
            $("#brewery_id").append(
                `<option value="${brewery.id}">${brewery.name}</option>`
            );
        });
    },
});

//Add beer
function addBeer() {
    if (confirm("Do you want to add this beer?") == true) {
        var data = {
            name: $("#name").val(),
            brewery_id: $("#brewery_id").val(),
            abv: $("#abv").val(),
            ibu: $("#ibu").val(),
            style: $("#style").val(),
            ounces: $("#ounces").val(),
        };

        $.ajax({
            url: "/api/beer",
            type: "POST",
            data: data,
            success: function (res) {
                alert("Create Successful");
                window.location.href = "/api_view/beer-list";
            },
        });
    }
}

//Delete beer
function deleteBeer(id, beername) {
    if (confirm("Do you want to delete " + beername + "?") == true) {
        $.ajax({
            url: "/api/delete-beer/" + id,
            type: "DELETE",
            success: function (msg) {
                alert(msg);
                location.reload();
            },
        });
    }
}

//Display UpdateBeer Form
$(function () {
    var id = window.location.pathname.split("/")[3];
    if (id != null) {
        $.ajax({
            url: "/api/update-beer/" + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#api-updateForm").append(
                    `<div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="${data["beer"].name}">
                    </div>
                    <div class="form-group">
                        <label>Brewery Name</label>
                        <select name="brewery_id" id="brewery_id" class="form-select form-select-lg col-12">            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ABV</label>
                        <input type="number" step=0.001 min="0" name="abv" id="abv" class="form-control" value="${data["beer"].abv}">
                    </div>
                    <div class="form-group">
                        <label>IBU (Optional)</label>
                        <input type="number" step=1 min="0" name="ibu" id="ibu" class="form-control" value="${data["beer"].ibu}">
                    </div>
                    <div class="form-group">
                        <label>Style</label>
                        <input type="text" name="style" id="style" class="form-control" value="${data["beer"].style}">
                    </div>
                    <div class="form-group">
                        <label>Ounces</label>
                        <input type="number" name="ounces" id="ounces" step=1 min="0" class="form-control" value="${data["beer"].ounces}">                   
                    </div>                
                    <button class="btn btn-primary" onclick="updateBeer(${data["beer"].id})">Submit</button>
                    <a href="/api_view/beer-list" class="btn btn-secondary ml-2">Cancel</a>`
                );
                data["breweries"].forEach((brewery) => {
                    var optionAppendCode = "";
                    if (brewery.id == data["beer"].brewery_id) {
                        optionAppendCode =
                            "<option value='" +
                            brewery.id +
                            "' selected='selected'>" +
                            brewery.name +
                            "</option>";
                    } else {
                        optionAppendCode =
                            "<option value='" +
                            brewery.id +
                            "'>" +
                            brewery.name +
                            "</option>";
                    }
                    $("#brewery_id").append(`${optionAppendCode}`);
                });
            },
        });
    }
});

//Update beer
function updateBeer(id) {
    console.log(id);
    if (confirm("Do you want to update this beer?") == true) {
        var data = {
            name: $("#name").val(),
            brewery_id: $("#brewery_id").val(),
            abv: $("#abv").val(),
            ibu: $("#ibu").val(),
            style: $("#style").val(),
            ounces: $("#ounces").val(),
        };

        $.ajax({
            url: "/api/beer/" + id,
            type: "POST",
            data: data,
            success: function (res) {
                alert("Update Successful");
                window.location.href = "/api_view/beer-list";
            },
        });
    }
}

//View Beer
$(function () {
    var id = window.location.pathname.split("/")[3];
    if (id != null) {
        $.ajax({
            url: "/api/view-beer/" + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#api-view").append(
                    `<div class="form-group">
                        <label>ID</label>
                        <p><b>${data["beer"].id}</b></p>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b>${data["beer"].name}</b></p>
                    </div>
                    <div class="form-group">
                        <label>Brewery Name</label>
                        <p><b>${data["brewery"].name}</b></p>
                    </div>
                    <div class="form-group">
                        <label>ABV</label>
                        <p><b>${data["beer"].abv}</b></p>
                    </div>
                    <div class="form-group">
                        <label>IBU</label>
                        <p><b>${data["beer"].ibu}</b></p>
                    </div>
                    <div class="form-group">
                        <label>Style</label>
                        <p><b>${data["beer"].style}</b></p>
                    </div>
                    <div class="form-group">
                        <label>Ounces</label>
                        <p><b>${data["beer"].ounces}</b></p>
                    </div>
                    <div class="form-group">
                        <label>Created Time</label>
                        <p><b>${data["beer"].created_at}</b></p>
                    </div>
                    <div class="form-group">
                        <label>Updated Time</label>
                        <p><b>${data["beer"].updated_at}</b></p>
                    </div>
                    <a href="/api_view/beer-list" class="btn btn-primary">Back</a>`
                );
            },
        });
    }
});
