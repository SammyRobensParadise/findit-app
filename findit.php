<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">
    <title>Find It</title>
</head>

<body>
    <div class="find-it-ui-header container">
        <h1 class="display-4">Welcome to Find It!</h1>
        <p class="description"> Find it allows you to locate and find everything from tools to dishes! ⚙️ 🍽️</p>
        <p class="instructions">Select your search and hit <b>find it</b> to get what you are looking for. Or select
            <b>create</b> to add a new item.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                    data-target="#data-entry">Create</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <p>Key Words, Seperate by <code>,</code></p>

                <div class="input-group input-group-lg">
                    <form action="search.php" method="get">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Text</span>
                        </div>
                        <input type="text" class="form-control" id="search-input" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-lg" placeholder="key,words,like,this"
                            name="key_words_input">

                </div>
                <br>
                <p>Or Search by Item ID. You can select multiple IDs by seperating them by <code>,</code></p>
                <div class="input-group input-group-lg">

                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
                    </div>
                    <input type="integer" class="form-control" id="search-input-2" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-lg" placeholder="Eg: 1234,4321">
                </div>

            </div>
            <div class="col-sm">

                <p>Type</p>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect1">
                            <option id="default1">Do Not Check...</option>
                            <option value="tools">Tools</option>
                            <option value="electronics">Electronics</option>
                            <option value="household_items">Household Items</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <p>Location</p>
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Type</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect2">
                            <option id="default2">Do Not Check...</option>
                            <option value="living_room">Living Room</option>
                            <option value="garage">Garage</option>
                            <option value="basement">Basement</option>
                            <option value="laundry_room">Laundry Room</option>
                        </select>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-outline-dark btn-lg btn-block"
                                onclick="clearResults()">⚠️
                                Clear
                                Search</button>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Find It</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="container">

        </div>
        <!--Modal-->
        <div class="modal fade" id="data-entry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Create a Entry</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Title</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Example Name" aria-label="Username"
                                aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Keywords</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Key,words,like,this"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Description</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea"
                                placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <p>Results:</p>
            <div class="jumbotron align-items-center" id="results-container">
            </div>
        </div>
        <!--Footer-->
        <div class="container">
            <p id="copyright">Find It ©️ 2019 <code>Version 1.0.1</code></p>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
            </script>
            <script src="./main.js"></script>
</body>

</html>