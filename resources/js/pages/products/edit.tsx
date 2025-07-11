import React from "react";
import AppLayout from "@/layouts/app-layout";
import { Head, usePage } from "@inertiajs/react";
import ProductCrudForm from "@/pages/products/components/product-crud-form";

const EditProduct = () => {
  const { product } = usePage().props; 

  return (
    <AppLayout>
      <Head title="Edit Product" />
      <div className="flex flex-col gap-6 p-6">
        <ProductCrudForm product={product} /> 
      </div>
    </AppLayout>
  );
};

export default EditProduct;
