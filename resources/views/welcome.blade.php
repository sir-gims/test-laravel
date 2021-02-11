@include('partials.head')
    <div class="container row mt-5 mr-4">
{{--        {{$reviews}}--}}
        <div class="col-sm-3 mr-3">
            <h3>Filter Reviews:</h3>
            <form method="get" action="{{route('filter')}}">
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
                        <option value="newest"> Newest First</option>
                        <option value="oldest">Oldest First </option>
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
                    <th scope="col">id</th>
                    <th scope="col">Review</th>
                    <th scope="col">Review Text</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Reviews created on</th>
                    <th scope="col">Reviews created date</th>
                    <th scope="col">Reviews created unixtimestamp</th>
                    <h4 style="color: red"><b style="color: olive">Note:</b> other fields i did't fetch because only these fields
                        are necessary to sort & filter. ‼️ ‼️</h4>
                </tr>
                </thead>
                <tbody>
                @if(isset($reviews))
                @foreach($reviews as $item)
                <tr>
                    <th scope="row">{{$item['id']}}</th>
                    <td>{{$item['reviewText']}}</td>
                    <td>{{Illuminate\Support\Str::limit($item['reviewFullText'],20) }}</td>
                    <td>{{$item['rating']}}</td>
                    <td>{{$item['reviewCreatedOn']}}</td>
                    <td>{{$item['reviewCreatedOnDate']}}</td>
                    <td>{{$item['reviewCreatedOnTime']}}</td>
                </tr>
                @endforeach
                @elseif (isset($filtered))
                    @foreach($filtered as $item)
                        <tr>
                            <th scope="row">{{$item['id']}}</th>
                            <td>{{$item['reviewText']}}</td>
                            <td>{{Illuminate\Support\Str::limit($item['reviewFullText'],20) }}</td>
                            <td>{{$item['rating']}}</td>
                            <td>{{$item['reviewCreatedOn']}}</td>
                            <td>{{$item['reviewCreatedOnDate']}}</td>
                            <td>{{$item['reviewCreatedOnTime']}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@include('partials.footer')
