import React from 'react';
import { Route } from 'react-router';
import NoSideNavLayout from './layouts/NoSideNavLayout';
import CreatePage from './pages/create/CreatePage';
import SideNavLayout from './layouts/SideNavLayout';
import DashboardPage from './pages/dashboard/DashboardPage';

function App() {
  return (
    <>
      <Route path='/' exact>
        <NoSideNavLayout>
          <CreatePage />
        </NoSideNavLayout>
      </Route>
      <Route path='/dashboard' exact>
        <SideNavLayout>
          <DashboardPage />
        </SideNavLayout>
      </Route>
    </>
  );
}

export default App;
