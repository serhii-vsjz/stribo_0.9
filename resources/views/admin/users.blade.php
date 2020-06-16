<table>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
                @foreach($user->roles as $role)
                    <td>
                        {{ $role->name }}
                    </td>
                @endforeach
        </tr>
    @endforeach
</table>
