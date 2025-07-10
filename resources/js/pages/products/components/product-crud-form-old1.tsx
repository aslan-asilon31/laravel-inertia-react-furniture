import React, { useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import useProductCrudStore from "@/pages/products/stores/useProductCrudStore"; // Zustand store

const ProductCrudForm = () => {
  const { selectedProduct, setSelectedProduct, handleSubmit, resetSelectedProduct, records } = useProductCrudStore(); // Access Zustand store's data and methods

  useEffect(() => {
    if (!selectedProduct) {
      resetSelectedProduct(); 
    }
  }, [selectedProduct, resetSelectedProduct]);

  const handleFormSubmit = (e) => {
    e.preventDefault();
    handleSubmit(selectedProduct); 
  };

  return (
    <form onSubmit={handleFormSubmit} className="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div className="flex flex-col">
        <Label htmlFor="name" className="block text-sm font-medium text-gray-700">
          Product Name
        </Label>
        <Input
          id="name"
          value={selectedProduct?.name || ""}
          onChange={(e) => setSelectedProduct({ ...selectedProduct, name: e.target.value })}
          placeholder="Enter product name"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>

      {/* SKU */}
      <div className="flex flex-col">
        <Label htmlFor="sku" className="block text-sm font-medium text-gray-700">
          SKU
        </Label>
        <Input
          id="sku"
          value={selectedProduct?.sku || ""}
          onChange={(e) => setSelectedProduct({ ...selectedProduct, sku: e.target.value })}
          placeholder="Enter SKU"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>

      {/* Slug */}
      <div className="flex flex-col">
        <Label htmlFor="slug" className="block text-sm font-medium text-gray-700">
          Slug
        </Label>
        <Input
          id="slug"
          value={selectedProduct?.slug || ""}
          onChange={(e) => setSelectedProduct({ ...selectedProduct, slug: e.target.value })}
          placeholder="Enter slug"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>

      {/* Price */}
      <div className="flex flex-col">
        <Label htmlFor="price" className="block text-sm font-medium text-gray-700">
          Price
        </Label>
        <Input
          id="price"
          type="number"
          value={selectedProduct?.price || ""}
          onChange={(e) => setSelectedProduct({ ...selectedProduct, price: e.target.value })}
          placeholder="Enter price"
          className="mt-2 block w-full border border-gray-300 rounded-md p-2"
        />
      </div>


      {/* Submit Button */}
      <div className="col-span-2 mt-6">
        <Button type="submit" className="w-full bg-blue-500 text-white rounded-md py-2">
          {selectedProduct?.id ? "Save Changes" : "Create Product"}
        </Button>
      </div>
    </form>
  );
};

export default ProductCrudForm;
