import React from 'react';
import TopNav from '../common/TopNav';
import { Container, Grid } from 'semantic-ui-react';
import SideNav from '../common/SideNav';

const SideNavLayout: React.FC = ({ children }) => {
  return (
    <section className='no-side-nav'>
      <TopNav />

      <Container>
        <Grid>
          <Grid.Row>
            <Grid.Column width={3}>
              <SideNav />
            </Grid.Column>
            <Grid.Column width={13}>
              <main>{children}</main>
            </Grid.Column>
          </Grid.Row>
        </Grid>
      </Container>
    </section>
  );
};

export default SideNavLayout;
