




<h2>

    {{App\VerifyPassword::where('user_id', request()->user()->id)->first()->code}}


</h2>