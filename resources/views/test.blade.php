
@foreach ($user as $user)
    <p> @foreach($user->leader as $leader)
            This is user:
            {{$leader->username}}
                    @endforeach

            </p>
@endforeach