@include('partials.head')
    <div class="container row mt-5 mr-4">
        {{$response->title}}
        <div class="col-sm-3 mr-3">
            <h3>Filter Reviews:</h3>
            <form action="">
                <div class="form-group">
                    <label for="o-rating">Order by Rating:</label>
                    <select id="o-rating" name="rating">
                        <option value="high"> Highest First</option>
                        <option value="low"> Lowest First</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="m-rating">Minimum Rating:</label>
                    <select id="m-rating" name="min-rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="o-date">Order by Date:</label>
                    <select id="o-date" name="date">
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="p-text">Prioritize by text:</label>
                    <select id="p-text" name="text">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-sm-3" value="Filter">
                </div>
            </form>
        </div>

        <div class="col-sm-6">
            <table class="table table-bordered mt-5 mr-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@include('partials.footer')
