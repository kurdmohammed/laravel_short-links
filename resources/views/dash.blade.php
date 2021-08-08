<x-front-layout>
    <!-- Table-->
<section>
<div class="container pt-5">
    <div class="container row">
        <div class="col-md-4 col-sm-12 pt-5 text-center">
            <div class="  py-4 " style="background-color:#212529;color:#fff; width:200px;height:200px;font-size: 20px;   border-radius: 10%;">
                <div class="inner">
                    <h3 style="font-size: 50px;">{{$count_all}}</h3>
                    <p> Number Of Links</p>
                </div>
               
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <canvas id="myChart" width="100%" height="50"></canvas>
        </div>

    </div>
<div class="py-3">
    <a href="/"><button type="submit" class="btn btn-primary">Create Link</button></a>
</div>
<div class="container"> <table class="table table-success table-striped ">
    <thead>
        <tr>
            <th>SHORT_URL</th>
            <th>CLICKS</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shortLinks as $link)
        @if($link->user_name == Auth::user()->name) 
        <tr class="table-warning">
            <td><a href="{{$link->short_url}}" target="_blank">{{$link->short_url}}</a></td>
            <td>{{$link->clicks}}</td>
            <td>
                <form action="{{url('delete/'.$link->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
 </table></div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr','May', 'Jun','Jul', 'Aug','Sept', 'Oct','Nov', 'Dec',],
            datasets: [{
                label: '# of Urls' ,
                data: [{!! json_encode($count1)!!},{!! json_encode($count2)!!},
                {!! json_encode($count3)!!},{!! json_encode($count4)!!},
                {!! json_encode($count5)!!},{!! json_encode($count6)!!},
                {!! json_encode($count7)!!},{!! json_encode($count8)!!},
                {!! json_encode($count9)!!},{!! json_encode($count10)!!},
             ],
                backgroundColor: [
                 'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)' 
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</x-front-layout>