import React, { useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import useProductCrudStore from "@/pages/products/stores/useProductCrudStore"; // Zustand store
import { useForm } from "@inertiajs/react";

const ProductCrudForm = () => {
  const { records, setRecords, handleSubmit, resetSelectedProduct,filterform,initFilterForm, selectedProduct } = useProductCrudStore(); // Access Zustand store's data and methods

  const form =  useForm({
    email: 'Email 1',
    password: 'Password 1',
    remember: false,
  });

  const form2 =  useForm({
    email: 'Email 1',
    password: 'Password 1',
    remember: false,
  })


  useEffect(() => {
      initFilterForm(form);

    if (selectedProduct && selectedProduct.id) {
      setRecords(selectedProduct); 
    } else {
      resetSelectedProduct();
    }
  }, [selectedProduct, setRecords, resetSelectedProduct]);

  const handleFormSubmit = (e) => {
    e.preventDefault();
    console.log(filterform);
    // form2.setData({email:'Email 2221'});
    filterform.setData({email:'Email 2222'})
    // handleSubmit(records);  // Use handleSubmit from Zustand store to submit the form
  };

  return (
    <form onSubmit={handleFormSubmit} className="grid grid-cols-1 md:grid-cols-2 gap-6">
     <div>
      {filterform?.data?.email}
      {/* {form2?.data?.email} */}
     </div>
     
      <div className="flex flex-col">
        <Label htmlFor="name" className="block text-sm font-medium text-gray-700">
          Product Name
        </Label>
        <Input
          id="name"
          value={records.name || ""}
          onChange={(e) => setRecords({ ...records, name: e.target.value })}
          placeholder="Enter product name"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>

      <div className="flex flex-col">
        <Label htmlFor="sku" className="block text-sm font-medium text-gray-700">
          SKU
        </Label>
        <Input
          id="sku"
          value={records.sku || ""}
          onChange={(e) => setRecords({ ...records, sku: e.target.value })}
          placeholder="Enter SKU"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>

      <div className="flex flex-col">
        <Label htmlFor="slug" className="block text-sm font-medium text-gray-700">
          Slug
        </Label>
        <Input
          id="slug"
          value={records.slug || ""}
          onChange={(e) => setRecords({ ...records, slug: e.target.value })}
          placeholder="Enter slug"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>

      <div className="flex flex-col">
        <Label htmlFor="price" className="block text-sm font-medium text-gray-700">
          Price
        </Label>
        <Input
          id="price"
          type="number"
          value={records.price || ""}
          onChange={(e) => setRecords({ ...records, price: e.target.value })}
          placeholder="Enter price"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>

      <div className="col-span-2 mt-6">
        <Button type="submit" className="w-full bg-blue-500 text-white rounded-md py-2">
          {records.id ? "Save Changes" : "Create Product"}
        </Button>
      </div>
    </form>
  );
};

export default ProductCrudForm;
