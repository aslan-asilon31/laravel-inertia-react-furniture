import React, { useEffect } from "react";
import { useForm } from "react-hook-form"; // Import useForm from react-hook-form
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { usePage } from "@inertiajs/react"; // To use props from Inertia

const ProductCrudForm = ({ product }) => {

    const { product: record } = usePage().props;
  

  // Initialize react-hook-form
  const {
    register,
    handleSubmit,
    formState: { errors },
    setValue,
    reset,
  } = useForm({
    defaultValues: {
      name: "",
      selling_price: "",
      availability: "",
      description: "",
    },
  });

  useEffect(() => {
    if (record) {
      setValue("name", record.name);
      setValue("price", record.price);
      setValue("slug", record.slug);
      setValue("description", record.description);
    }
  }, [record, setValue]);

  const onSubmit = (data) => {
    if (record) {
      handleUpdateProduct(data);
    } else {
      handleCreateProduct(data);
    }
  };

  const handleCreateProduct = async (data) => {
    try {
      await axios.post("/products", data); 
      window.location.href = "/products"; 
    } catch (error) {
      console.error("Error creating product", error);
    }
  };

  const handleUpdateProduct = async (data) => {
    try {
      await axios.put(`/products/${product.id}`, data); 
      window.location.href = `/products/${product.id}`; 
    } catch (error) {
      console.error("Error updating product", error);
    }
  };

  return (
    <form onSubmit={handleSubmit(onSubmit)} className="space-y-4">
      <div>
        <label htmlFor="name">Product Name</label>
        <Input
          id="name"
          {...register("name", { required: "Name is required" })}
          placeholder="Enter product name"
        />
        {errors.name && <p className="text-red-500">{errors.name.message}</p>}
      </div>

      <div>
        <label htmlFor="selling_price">Selling Price</label>
        <Input
          id="selling_price"
          {...register("selling_price", { required: "Price is required" })}
          placeholder="Enter product price"
        />
        {errors.selling_price && (
          <p className="text-red-500">{errors.selling_price.message}</p>
        )}
      </div>

      <div>
        <label htmlFor="availability">Availability</label>
        <Input
          id="availability"
          {...register("availability")}
          placeholder="Enter availability"
        />
      </div>

      <div>
        <label htmlFor="description">Description</label>
        <textarea
          id="description"
          {...register("description")}
          placeholder="Enter product description"
        />
      </div>

      <Button type="submit">{product ? "Update Product" : "Create Product"}</Button>
    </form>
  );
};

export default ProductCrudForm;
