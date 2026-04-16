<!DOCTYPE html>
<html>
<head>
    <title>Quản lý người dùng</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-add { background-color: #28a745; color: white; padding: 10px; border: none; cursor: pointer; }
        .btn-delete { background-color: #dc3545; color: white; border: none; padding: 5px 10px; cursor: pointer; }
        .btn-update { background-color: #ffc107; border: none; padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>

    <h1>Quản lý thành viên hệ thống</h1>

    <fieldset>
        <legend>Thêm người dùng mới</legend>
        <form action="/users" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nhập tên" required>
            <input type="email" name="email" placeholder="Nhập email" required>
            <button type="submit" class="btn-add">Thêm mới</button>
        </form>
    </fieldset>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên & Email (Sửa trực tiếp)</th>
                <th>Ngày tham gia</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <form action="/users/{{ $user->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $user->name }}" required>
                            <input type="email" name="email" value="{{ $user->email }}" required>
                            <button type="submit" class="btn-update">Lưu</button>
                        </form>
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="/users/{{ $user->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>