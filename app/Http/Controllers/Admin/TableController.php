<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
class TableController extends Controller
{
    /**
     * Hiển thị danh sách bàn.
     */
    public function index()
    {
        $tables = Table::all(); 
        return view('admin.tables.index', compact('tables')); // Trả về view với danh sách bàn
    }

    /**
     * Hiển thị form tạo bàn mới.
     */
    public function create()
    {
        return view('admin.tables.create'); // Trả về form tạo bàn
    }

    /**
     * Lưu bàn mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seats' => 'required|integer|min:1',
        ]);

        Table::create([
            'name' => $request->name,
            'seats' => $request->seats,
            'status' => 'available', // Mặc định là available
        ]);

        return redirect()->route('admin.tables.index')->with('success', 'Bàn mới đã được thêm thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa bàn.
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table')); // Trả về form chỉnh sửa với thông tin bàn
    }

    /**
     * Cập nhật thông tin bàn.
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seats' => 'required|integer|min:1',
        ]);

        $table->update([
            'name' => $request->name,
            'seats' => $request->seats,
        ]);

        return redirect()->route('admin.tables.index')->with('success', 'Thông tin bàn đã được cập nhật!');
    }

    /**
     * Xóa bàn.
     */
    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('admin.tables.index')->with('success', 'Bàn đã được xóa thành công!');
    }
}