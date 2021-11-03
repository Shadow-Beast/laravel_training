$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//Beer-List
$.ajax({
    url: "/api/beer-list",
    type: "GET",
    dataType: "json",
    success: function (data) {
        data.forEach((beer) => {
            var created_at = moment(beer.created_at, 'YYYY-MM-DD HH:mm:ss').format("YYYY-MM-DD HH:mm:ss");
            var updated_at = moment(beer.updated_at, 'YYYY-MM-DD HH:mm:ss').format("YYYY-MM-DD HH:mm:ss");
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
                        <form action="/api_view/delete-beer/${beer.id}" method="post" onSubmit="return confirm('Do you want to delete ${beer.name}?')" class="delete">
                            <button type="submit" class="btn btn-danger" title="Delete" data-toggle="tooltip">
                                <span class="fa fa-trash"></span>
                            </button>
                        </form>
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
$("#api-addBeerForm").submit(function() {
    var form = $('#api-addBeerForm')[0];
    var data = new FormData(form);
    console.log(data);
    // $.ajax({
    //     url: "/api/beer",
    //     type: "POST",
    //     data: {
    //         "_token": "{{ csrf_token() }}",
    //         data: data
    //     },
    //     success: function (data) {
    //         console.log("Create Successful");
    //         window.location.href = "/api_view/beer";
    //     },
    // });
})