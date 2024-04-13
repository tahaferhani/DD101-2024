$("button").on("click", function (event) {
    event.preventDefault();
    var name = $("#name-input").val();

    $("body").addClass("loader");
    $.get(`https://api.nationalize.io/?name=${name}`, function (data) {
        $("#countries").empty();

        for (var i = 0; i < data.country.length; i++) {
            const country = data.country[i];
            const countryId = country.country_id;
            const percentage = Math.round(country.probability * 100) + "%";

            $("#countries").append(`
                    <li>
                        <img width="20" src="https://flagsapi.com/${countryId}/flat/64.png">
                        ${percentage}
                    </li>
                `);
        }

        $("body").removeClass("loader");
    })

    // $.ajax({
    //     url: `https://api.nationalize.io/?name=${name}`,
    //     method: "get",
    //     success: function (data) {
    //         $("#countries").empty();

    //         for (var i = 0; i < data.country.length; i++) {
    //             const country = data.country[i];
    //             const countryId = country.country_id;
    //             const percentage = Math.round(country.probability * 100) + "%";

    //             $("#countries").append(`
    //                 <li>
    //                     <img width="20" src="https://flagsapi.com/${countryId}/flat/64.png">
    //                     ${percentage}
    //                 </li>
    //             `);
    //         }
    //     }
    // })
})