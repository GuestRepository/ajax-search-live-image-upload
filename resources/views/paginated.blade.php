@if(sizeof($pages) >0)
@foreach($pages as $p)
                            <tr>
                                <td>{{$p->username}}</td>
                                <td>{{ $p->image_title }}</td>
                                <td><img src="{{ URL::asset('/storage/image/'.$p->image) }}"
                                        alt="" height="30" width="50" class="shadow border border-dark">
                                </td>
                            </tr>
                        @endforeach


                        @else
                        <tr>
                        <th></th>
    <th style="font-size: 22px; color:red;">Data not found</th>
    <th></th>
                        </tr>

    @endif                    