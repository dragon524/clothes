
<!-- SEARCH SECTION -->

<style type="text/css">
    .search-field .prefix ~ input, .search-field .prefix ~ textarea, .search-field .prefix ~ label, .search-field .prefix ~ .validate ~ label, .search-field .prefix ~ .helper-text, .search-field .prefix ~ .autocomplete-content{
        margin-right: 5px !important;
        margin-left: 0; 
    }
    .searchbar .input-field.col label{
        left: 4.5em
    }
</style>

<section class="indigo darken-2 white-text center">
    <div class="container">
        <div class="row m-b-0">
            <div class="col s12">

                <form action="{{ route('search')}} " method="GET">

                    <div class="searchbar" style="text-align: center;">
                        <div class="col s12 m3"></div>
                        <div class="input-field search-field col s12 m6">
                            <i class="material-icons prefix" style="color: #1a237e">search</i>
                            <input type="text" name="city" id="autocomplete-input" style="padding-left: 40px !important;" class="autocomplete custominputbox" autocomplete="off">
                            <label for="autocomplete-input">Enter City or State</label>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>