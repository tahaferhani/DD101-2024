// $.get("./data.json", function(data) {
//     console.log(data);
// })

// $.ajax({
//     url: "./data.json",
//     success: function(data) {
//         var tbody = document.querySelector("table tbody");
//         for(var i = 0; i < data.length; i++) {
//             var item = data[i];
//             tbody.innerHTML = tbody.innerHTML + `
//                 <tr>
//                     <td>${item.id}</td>
//                     <td>${item.name}</td>
//                     <td>${item.age}</td>
//                     <td>${item.email}</td>
//                 </tr>
//             `;
//         }
//     }
// })


function onButtonClick(e) {
    var btn = e.target;
    var td = btn.parentElement.previousElementSibling.previousElementSibling;
    td.children[0].style.display = "none";
    td.children[1].style.display = "block";
}

$.get("https://jsonplaceholder.typicode.com/todos", function(data) {
    var tbody = document.getElementById("todo");
    for(var i = 0; i < data.length; i++) {
        var item = data[i];
        tbody.innerHTML = tbody.innerHTML + `
            <tr>
                <td>
                    <span>${item.title}</span>
                    <form>
                        <input value="${item.title}"/>
                        <button>Save</button>
                    </form>    
                </td>
                <td><input type="checkbox" ${item.completed ? 'checked' : ''}/></td>
                <td><button onclick="onButtonClick(event)">Edit</button></td>
            </tr>
        `;
    }
})
