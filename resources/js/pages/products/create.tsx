import React, { useEffect } from "react";
import AppLayout from "@/layouts/app-layout";
import { Card, CardHeader, CardTitle } from "@/components/ui/card";
import { Head } from "@inertiajs/react";
import ProductCrudForm from "@/pages/products/components/product-crud-form";
import useProductCrudStore from "@/pages/products/stores/useProductCrudStore"; // Zustand store

const CreateProduct = () => {
  const { clearFilter } = useProductCrudStore(); 

  // useEffect(() => {
  //   clearFilter(); 
  // }, [clearFilter]); 

  return (
    <AppLayout>
      <Head title="Create Product" />
      <div className="flex flex-col gap-6 p-6">
        <Card>
          <CardHeader>
            <CardTitle className="text-xl font-semibold">Create a New Product</CardTitle>
          </CardHeader>
        </Card>

        <Card className="p-6 bg-white shadow-md rounded-lg">
          <ProductCrudForm />  
        </Card>
      </div>
    </AppLayout>
  );
};

export default CreateProduct;
