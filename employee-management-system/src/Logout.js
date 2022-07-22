function Logout(){
    const url = "http://localhost:8000/server.php";
    const handleSumbit = (e) => {
        e.preventDefault();
        const form = $(e.target);
        $.ajax({
          type: "POST",
          url: url ,
          data: $.param({ login: "out" }), // them role
          success(res) {
            console.log("resAjax: ", res);
            if (res == "true") {
              props(true);
            }
            if (res == 2) {
              props(2);
            }
          },
        });
    };
    return (
        <button
            id="logout-button"
            
            >
        Log out
        </button>
    )

}

export default Logout