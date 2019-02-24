$( document ).ready(function() {

    var url = $('#url').val();


//On menu item click
    $('body').on('click', '.model-item', function (){

        let id = $(this).data("id");
        let modelName = $(this).html();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).ajaxStart(function () {
            $("#loading").show();
        }).ajaxStop(function () {
            $("#loading").hide();
        });

        $('.modelName').html(modelName);

        $.ajax({
            method: 'GET',
            url: url,
            data: {'id' : id},
            success: function(response){
                let container = $('.cars>.row');

                    container.html("");

                if(response.length > 0){
                        for (let i =0; i< response.length; i++){
                            container.append(`
                                <div class="col-md-4">
                                 <div class="card" style="width: 18rem;">
                                     <img class="card-img-top" src="${response[i].image_path}" alt="Card image cap">
                                      <div class="card-body">
                                          <h5 class="card-title">${response[i].name}</h5>
                                          <p class="card-text">${response[i].short_info}</p>
                                      </div>
                                 </div>
                                </div>
                        
                        `);
                    }
                }else{
                    container.append(`There are not any car for this model yet.`)
                }

            },
            error: function() { // What to do if we fail

                console.log("AJAX error: ");
            }
        });




    });
});