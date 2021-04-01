import React, { useEffect, useState } from 'react';
import { Header, Segment, Icon, List, Image } from 'semantic-ui-react';
import agent from '../../api/agent';
import { Invoice } from '../../models/invoice';

const DashboardPage = () => {
  const [invoices, setInvoices] = useState<Invoice[]>([]);

  useEffect(() => {
    agent.Invoices.list().then((response) => {
      setInvoices(response);
    });
  }, []);

  return (
    <Segment>
      <Header as='h3' dividing>
        <Icon name='file alternate outline' />
        <Header.Content>Manage Invoices</Header.Content>
      </Header>
      <List relaxed='very'>
        {invoices.map((invoice) => (
          <List.Item key={invoice.id}>
            <Image avatar src='/assets/avatars/1.png' />
            <List.Content>
              <List.Header as='a'>{invoice.customer.name}</List.Header>
              <List.Description>Last seen watching just now.</List.Description>
            </List.Content>
          </List.Item>
        ))}
      </List>
    </Segment>
  );
};

export default DashboardPage;
