import React from "react";
import { Table, TableHeader, TableBody, TableRow, TableCell, TableHead } from "@/components/ui/table";
import { Head, usePage } from "@inertiajs/react";

const ProductTable = () => {
  const { records } = usePage().props;
console.log('ceeeek records',records);

  return (
    <Table>
      <TableHeader>
        <TableRow>
          <TableHead>No</TableHead>
          <TableHead>Name</TableHead>
          <TableHead>Price</TableHead>
          <TableHead>SKU</TableHead>
          <TableHead>Slug</TableHead>
          <TableHead>Description</TableHead>
          <TableHead>Status</TableHead>
          <TableHead>Aksi</TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        {records.map((record, index) => (
          <TableRow key={record.id}>
            <TableCell>{++index}</TableCell>
            <TableCell>{record.name}</TableCell>
            <TableCell>Rp {record.selling_price}</TableCell>
            <TableCell>{record.availability}</TableCell>
            <TableCell>{record.image_url}</TableCell>
            <TableCell>{record.created_by}</TableCell>
            <TableCell>{record.updated_by}</TableCell>
            <TableCell>{new Date(record.created_at).toLocaleDateString()}</TableCell>
            <TableCell>{new Date(record.updated_at).toLocaleDateString()}</TableCell>
            <TableCell>{record.is_activated ? "Active" : "Inactive"}</TableCell>
            <TableCell>
              {/* Add action buttons for edit and delete */}
            </TableCell>
          </TableRow>
        ))}
      </TableBody>
    </Table>
  );
};

export default ProductTable;
