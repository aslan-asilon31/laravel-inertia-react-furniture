import React, { useEffect, useState } from "react";
import { Button } from "@/components/ui/button";
import AppLayout from "@/layouts/app-layout";
import { Head, usePage } from "@inertiajs/react";
import ProductTable from "@/pages/products/components/product-table"; // Product Table Component
import useProductStore from "@/pages/products/stores/useProductIndexStore"; // Zustand store
import { Card, CardHeader, CardTitle, CardContent } from "@/components/ui/card";
"use client";

const ProductIndex = () => {
  const { products: productList } = usePage().props; // Fetching 'products' from Inertia
  const { setRecords, records } = useProductStore(); // Access Zustand store

  // Effect to update Zustand store with Inertia 'products'
  useEffect(() => {
    if (productList) {
      setRecords(productList); // Set 'productList' from Inertia to Zustand store
    }
  }, [productList, setRecords]); // Re-run when 'productList' changes

  const [isSheetOpen, setIsSheetOpen] = useState(false); // State for controlling sheet visibility
  const toggleSheet = () => setIsSheetOpen((prevState) => !prevState); // Toggle sheet visibility

  return (
    <AppLayout>
      <Head title="Products" />
      <div className="flex flex-col gap-4 rounded-xl p-4 overflow-x-auto">
        <Card>
          <CardHeader>
            <CardTitle>Product Page</CardTitle>
          </CardHeader>
        </Card>

        <Card>
          <CardContent>
            {records && records.length > 0 ? (
              <ProductTable /> // Show ProductTable if products are available
            ) : (
              <div>No products available</div> // Show a message if no products are found
            )}
          </CardContent>
        </Card>
      </div>
    </AppLayout>
  );
};

export default ProductIndex;
